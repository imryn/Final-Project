<?php

    require_once('db.php');

    class Presence{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function error(){
            echo json_encode((object) [
                'error'=>true
            ]);
        }


      

        public function getPresence(){
            $sql = "SELECT exceptions.observation, exceptions.observationDate,exceptions.fname,exceptions.lastname FROM exceptions WHERE exceptions.observationDate>={$_GET['startDate']}
            AND exceptions.observationDate<={$_GET['endDate']} AND exceptions.fname='{$_GET['kidFname']}' AND exceptions.lastname='{$_GET['kidLname']}'" ;
 
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'first_name' => $row['fname'],
                        'last_name' => $row['lastname'],
                        'note' => $row['observation'],
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

        public function __destruct(){
            $this->db->close();
        }
      
    }

?>

    