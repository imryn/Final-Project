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
                {$_POST['vegan']},{$_POST['vegetarian']},'{$_POST['comments']}',{$_POST['parentId']}, '{$_POST['lastname']}'";

                $sql = "INSERT INTO kids (fname,kidId,bDate,genders,celiac,eggs,fish,
                kiwis,lactoseintolerance,nuts,soy,strawberries,vegan,vegetarian,comments,parentId,lastname) VALUES ($values)";
                
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
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


        public function getAllallergies(){
            $sql = "SELECT kids.fname, kids.lastname, users.firstname, users.mobilephone, kids.eggs FROM kids
            INNER JOIN users ON kids.parentId=users.parentId AND kids.{$_GET['alergicOptions']}=1 <> '' ";
            $result =$this->db->query($sql); 
            if($result){
                $data= [];
                while($row = mysqli_fetch_array($result)){
                    array_push($data, (object) [
                        'first_name' => $row['fname'],
                        'last_name' => $row['lastname'],
                        'parent_name' => $row['firstname'],
                        'phone_number' => $row['mobilephone']
                    ]);  
                }
        
            }
            echo json_encode((object) [
                'data' => $data,
                'success'=>true
            ]);
        }
        
        public function showKindergartenkidsList(){
            $sql = "SELECT kids.fname, kids.lastname FROM kids INNER JOIN users
            ON kids.parentId=users.parentId INNER JOIN kindergarten ON users.kindergartenid=kindergarten.kindergartenId";

            $result =$this->db->query($sql);
            if($result){
                while ($row  = $result->fetch_assoc() ) {
                    $data[] = $row;
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

     public function showkid(){
        $sql = "SELECT kids.fname, kids.lastname FROM kids INNER JOIN users
        ON kids.parentId=users.parentId WHERE users.parentId={$_SESSION['parentId']}";

        $result =$this->db->query($sql);
        if($result){
            while ($row  = $result->fetch_assoc() ) {
                $data[] = $row;
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
  
        function showInfoAboutakid(){
            
           $sql = "SELECT kids.kidId, kids.fname, kids.lastname, kids.bDate, kids.genders, kids.celiac,
           kids.eggs, kids.fish, kids.kiwis, kids.lactoseintolerance, kids.nuts, kids.soy,
           kids.strawberries, kids.vegan, kids.vegetarian, kids.comments FROM kids INNER JOIN users ON kids.parentId=users.parentId
           WHERE users.parentId={$_SESSION['parentId']}";
           $result =$this->db->query($sql);
           if($result){
                $data = $result->fetch_assoc();
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            }
            else{
                $this->error();
            }

        }

    function showInfoAboutchoosenkid(){
        $sql = "SELECT kids.kidId, kids.fname, kids.lastname, kids.bDate, kids.genders, kids.celiac,
        kids.eggs, kids.fish, kids.kiwis, kids.lactoseintolerance, kids.nuts, kids.soy,
        kids.strawberries, kids.vegan, kids.vegetarian, kids.comments FROM kids WHERE kids.fname='{$_GET['kidFname']}' AND
        kids.lastname='{$_GET['kidLname']}'";
        
        $result =$this->db->query($sql);
        if($result){
             $data = $result->fetch_assoc();
             echo json_encode((object) [
                 'data' => $data,
                 'success'=>true
             ]);
         }
         else{
             $this->error();
         }

      }

        function updateKidbag(){
            foreach( $_POST as $key => $value ) {
                $_POST[$key] = strip_tags($this->db->real_escape_string($value));
             }
                   $sql = "UPDATE kids SET fname='{$_POST['fname']}',lastname='{$_POST['lastname']}', bDate={$_POST['bDate']}, genders='{$_POST['genders']}',
                   celiac={$_POST['celiac']}, eggs={$_POST['eggs']}, fish={$_POST['fish']}, kiwis={$_POST['kiwis']},
                   lactoseintolerance={$_POST['lactoseintolerance']}, nuts={$_POST['nuts']}, soy={$_POST['soy']},
                   strawberries={$_POST['strawberries']}, vegan={$_POST['vegan']}, vegetarian={$_POST['vegetarian']},
                   comments='{$_POST['comments']}'
                   WHERE kids.kidId={$_POST['kidId']}";
                
                $result =$this->db->query($sql);
                if($result){
                    $id = $this->db->insert_id;
                     echo json_encode((object) [
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
