<?php

    require_once('db.php');

    class Users{

        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
        }

        private function allowSpecialCharacters($method){
            foreach( $method as $key => $value ) {
                     $method[$key] = strip_tags($this->db->real_escape_string($value));
            }
        }
       
        public function createUser(){
                $this->allowSpecialCharacters($_POST);
                $values = "'{$_POST['parentId']}','{$_POST['name']}','{$_POST['familyMember']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['password']}'";
                $sql = "INSERT INTO users (parentId,name,familyMember,phone,email,password) VALUES ($values)";
                $result =$this->db->query($sql);
            

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

      
        public function getAll(){
            $sql = "SELECT * FROM users";
            $result =$this->db->query($sql); 
            if($result){
               $data= [];
             while($row = mysqli_fetch_array($result)){
                 array_push($data, (object) [
                     'name' => $row['name'],
                     'familyMember' => $row['familyMember'],
                     'phone' => $row['phone'],
                     'email' => $row['email'],
                     'parentId' => $row['parentId']
                ]);
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
    


         public function login(){
            $this->allowSpecialCharacters($_POST);
            $sql = "SELECT email FROM users WHERE email='{$_POST['email']}' AND password ='{$_POST['password']}'";
            $result = $this->db->query($sql); 
            if(mysqli_num_rows($result) > 0 ){
                header("Location: /Sadna/index.html");
            }
            else{
                header("Location: /Sadna/login_page.html");
            }
           
        }
   
        
        public function __destruct(){
            $this->db->close();
       }
       
    }
    
?>

