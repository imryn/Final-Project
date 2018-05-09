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
            // $sql = "SELECT noattendance.date, noattendance.kidId FROM noattendance WHERE noattendance.date>={$_GET['startDate']}
            // AND noattendance.date<={$_GET['endDate']} AND noattendance.kidId='{$_GET['kidId']}'" ;
            $sql = "SELECT noattendance.date, noattendance.kidId 
                    FROM noattendance 
                    WHERE noattendance.date>=DATE('{$_GET['startDate']}')
                    AND noattendance.date<=DATE('{$_GET['endDate']}')" ;

            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'Child ID' => $row['kidId']//,
                        // 'date' => $row['date']
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

    