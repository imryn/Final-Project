<?php

    require_once('db.php');

    class Kids{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function error(){
            echo json_encode((object) [
                'error'=>true
            ]);
        }

        public function createKidbag(){

            foreach( $_POST as $key => $value ) {
                    $_POST[$key] = strip_tags($this->db->real_escape_string($value));
            }

            if(!empty($_POST['fname']) && !empty($_POST['kidId']) && !empty($_POST['bDate']) &&
                !empty($_POST['genders']) ){

                $values = "'{$_POST['fname']}',{$_POST['kidId']},{$_POST['bDate']},'{$_POST['genders']}',
                {$_POST['celiac']},{$_POST['eggs']},{$_POST['fish']},{$_POST['kiwis']},
                {$_POST['lactoseintolerance']},{$_POST['nuts']},{$_POST['soy']},{$_POST['strawberries']},
                {$_POST['vegan']},{$_POST['vegetarian']},'{$_POST['comments']}'";

                $sql = "INSERT INTO kids (fname,kidId,bDate,genders,celiac,eggs,fish,
                kiwis,lactoseintolerance,nuts,soy,strawberries,vegan,vegetarian,comments) VALUES ($values)";
                
                $result =$this->db->query($sql);
                $id = $this->db->insert_id;
                if($result){
                     echo json_encode((object) [
                        'id' => $id,
                         'success'=>true
                    ]);
                }
                else{
                    $this->error();
                }
            }
            else{
                $this->error();
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
