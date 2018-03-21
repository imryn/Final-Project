<?php  

   class DB {

        private static $instance = null;
        private $connect;
    
        private function __construct(){
           $this->connect = new mysqli('imryno.mtacloud.co.il:3307','imryno_sa', '1qaz2wsx', 'imryno_project');
                        // $this->connect = new mysqli('localhost','root', '', 'project');

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