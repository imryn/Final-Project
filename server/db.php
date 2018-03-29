<?php  

   class DB {

        private static $instance = null;
        private $connect;
    
        private function __construct(){
        //  $this->connect = new mysqli('localhost','root', '', 'project');
          $this->connect = new mysqli('us-cdbr-gcp-east-01.cleardb.net','b1cecd1cfb136f', '7e767b54', 'gcp_69477eab26f5d4ebcd7f');
        }
        
        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new DB();
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->connect;
        }
  } 

?>6