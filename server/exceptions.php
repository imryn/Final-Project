<?php

    require_once('db.php');

    class Exceptions{
        
        function __construct() {
            $db =  DB::getInstance();
            $this->db = $db->getConnection();
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
            {$_POST['kidId']},'{$_POST['fname']}'";
    
            $sql = "INSERT INTO exceptions (observation,observationDate,SpecialRequests,kidId,fname) VALUES($values)";
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

        public function __destruct(){
            $this->db->close();
        }
      
    }

?>

    