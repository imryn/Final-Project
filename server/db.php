<?php  

   class DB {

        private static $instance = null;
        private $connect;
    
        private function __construct(){
            $this->connect = new mysqli('84.229.144.10','imryno_imryno', '&#$nBP8;&ZDx', 'imryno_project');
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

?>