<?php

    require_once('db.php');
    // session_start();

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
            if(isset($_GET['lastname'])){
                $sql = "SELECT noattendance.date as date, noattendance.kidId,kids.fname as fname,kids.lastname as lastname
                        FROM noattendance 
                        join kids on noattendance.kidId=kids.kidId
                        join users on kids.parentId=users.parentId
                        INNER JOIN crew ON users.kindergartenid=crew.kindergartenId
                        WHERE noattendance.date>=DATE('{$_GET['startDate']}')
                            AND noattendance.date<=DATE('{$_GET['endDate']}')
                            and kids.fname='{$_GET['fname']}'
                            and kids.lastname='{$_GET['lastname']}'
                            AND kids.parentId not in (select parentId from noattendance where date=current_date()) and crew.kTeacherId={$_SESSION['kTeacherId']}
                            order by noattendance.date
                        " ;
            }
            else{
                $sql = "SELECT noattendance.date as date, noattendance.kidId,kids.fname as fname,kids.lastname as lastname
                FROM noattendance 
                join kids on noattendance.kidId=kids.kidId
                join users on kids.parentId=users.parentId
                INNER JOIN crew ON users.kindergartenid=crew.kindergartenId
                WHERE noattendance.date>=DATE('{$_GET['startDate']}')
                    AND noattendance.date<=DATE('{$_GET['endDate']}')
                    AND kids.parentId not in (select parentId from noattendance where date=current_date()) and crew.kTeacherId={$_SESSION['kTeacherId']}
                    order by noattendance.date
                " ;
            }
            // AND kids.parentId not in (select parentId from noattendance where date=current_date()) and crew.kTeacherId={$_SESSION['kTeacherId']}
            
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'date' => $row['date'],
                        'fname'  => $row['fname'],
                        'lastname'  => $row['lastname']
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

    