<?php

    require_once('db.php');

    class Kids{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        public function createKidbag(){

                foreach( $_POST as $key => $value ) {
                     $_POST[$key] = strip_tags($this->db->real_escape_string($value));
                }
                

                // $createTime = now_time_in_timeStampe()

                $values = "'{$_POST['fname']}','{$_POST['kidId']}','{$_POST['bDate']}','{$_POST['genders']}',
                ,'{$_POST['allergies']}','{$_POST['comments']}','{$_POST['foodpreference']}'";

            
                $sql = "INSERT INTO kids (fname,kidId,bDate,genders,allergies,comments,foodpreference) VALUES ($values)";

                
                $result =$this->db->query($sql);
                $id = $this->db->insert_id;
                if($result){
                     echo json_encode((object) [
                        'id' => $id,
                         'success'=>true
                    ]);
                }
                else{
                    echo json_encode((object) [
                        'error'=>true
                    ]);
                }
               
        }

        private function getAllallergies(){
            $sql = "SELECT * FROM kids WHERE allergies <> '' ";
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    
                    if($row['fathername'] && $row['mothername']){
                        array_push($data, (object) [
                        'id' => $row['kidId'],
                        'name' => $row['fname'],
                        'last_name' => $row['lname'],
                        'father_name' => $row['fathername'],
                        'mother_name' => $row['mothername'],
                        'allergies' => $row['allergies']
                        ]);
                    }
                    else if(empty($row['futhername']) && $row['mothername']){
                        array_push($data, (object) [
                            'id' => $row['kidId'],
                            'name' => $row['fname'],
                            'last_name' => $row['lname'],
                            'mother_name' => $row['mothername'],
                            'allergies' => $row['allergies']
                        ]);
                    }

                    else if($row['futhername'] && empty($row['mothername'])){
                        array_push($data, (object) [
                            'id' => $row['kidId'],
                            'name' => $row['fname'],
                            'last_name' => $row['lname'],
                            'father_name' => $row['fathername'],
                            'allergies' => $row['allergies'] 
                        ]);
                    }

                }
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            }
            else{
                 echo json_encode((object) [
                    'error'=>true
                ]);
            }
        }

        public function createKidAlergicReport(){
             if($_GET['optionsReport'] == 'allergies-report'){
                $this->getAllallergies();
             }
        }
        
        


       public function __destruct(){
             $this->db->close();
       }
       
     }
    


?>
