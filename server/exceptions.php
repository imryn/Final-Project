<?php

    require_once('db.php');

    class Exceptions{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function allowSpecialCharacters($method){
            foreach( $method as $key => $value ) {
                     $method[$key] = strip_tags($this->db->real_escape_string($value));
            }
        }

        private function error(){
            echo json_encode((object) [
                'error'=>true
            ]);
        }


        function DetailsUpdate(){

            foreach( $_POST as $key => $value ) {
                $_POST[$key] = strip_tags($this->db->real_escape_string($value));
            }

            $values = "'{$_POST['observation']}','{$_POST['observationDate']}','{$_POST['SpecialRequests']}',
            {$_POST['kidId']},'{$_POST['fname']}','{$_POST['lastname']}','{$_SESSION['kindergartenid']}'";
    
            $sql = "INSERT INTO exceptions (observation,observationDate,SpecialRequests,kidId,fname,lastname,kindergartenid) VALUES($values)";
            $result =$this->db->query($sql);
            if($result){
             echo json_encode((object) [
                 'success'=>true
            ]);
          }
          else{
             $this->error();
           }
        }

        public function getAllExceptions(){
            $sql = "SELECT exceptions.observation, exceptions.specialRequests ,exceptions.observationDate,exceptions.fname,exceptions.lastname FROM exceptions WHERE exceptions.observationDate>={$_GET['startDate']}
            AND exceptions.observationDate<={$_GET['endDate']} AND exceptions.fname='{$_GET['kidFname']}' AND exceptions.lastname='{$_GET['kidLname']}'" ;

            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'first_name' => $row['fname'],
                        'last_name' => $row['lastname'],
                        'note' => $row['observation'],
                        'date' => $row['observationDate'],
                        'specialReq' => $row['specialRequests']
                    ]);  
                }
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            }
            else{
                $this->error();
            }
          
        }

        public function getkidExceptions(){
            $sql = "SELECT exceptions.observation, exceptions.specialRequests, exceptions.observationDate,exceptions.fname,exceptions.lastname
            FROM exceptions INNER JOIN kids ON exceptions.kidId=kids.kidId WHERE
            exceptions.observationDate>={$_GET['startDate']} AND exceptions.observationDate<={$_GET['endDate']}
            AND exceptions.fname='{$_GET['kidFname']}' AND exceptions.lastname='{$_GET['kidLname']}'" ;
 
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'first_name' => $row['fname'],
                        'last_name' => $row['lastname'],
                        'note' => $row['observation'],
                        'specialReq' => $row['specialRequests'],
                        'date' => $row['observationDate']
                    ]);  
                }
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            }
            else{
                $this->error();
            }
          
        }

    public function getAllExceptionsInGraph(){
        $selectedKid = "";
        if($_GET['kidFname'] != 'All'){
            $selectedKid = "AND exceptions.fname='{$_GET['kidFname']}' AND exceptions.lastname='{$_GET['kidLname']}' ";
        }
        $sql = "SELECT exceptions.observation,exceptions.fname,exceptions.lastname FROM exceptions WHERE exceptions.observationDate>={$_GET['startDate']}
        AND exceptions.observationDate<={$_GET['endDate']} {$selectedKid} AND exceptions.kindergartenid= '{$_SESSION['kindergartenid']}'" ;

        $result =$this->db->query($sql); 
        if($result){
            $data= [];
            while($row = mysqli_fetch_array($result)){
                array_push($data, (object) [
                    'first_name' => $row['fname'],
                    'last_name' => $row['lastname'],
                    'note' => $row['observation'],
                ]);  
            }
            echo json_encode((object) [
                'data' => $data,
                'success'=>true
            ]);
        }
          else{
              $this->error();
           }
      
    }

            public function __destruct(){
                $this->db->close();
        }
  
    }
?>

    