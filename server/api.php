<?php

       include 'new-user.php';
       include 'kids.php';

       $method = $_SERVER['REQUEST_METHOD'];


  

       if( $method == "POST" && isSet($_POST['route']) ){
           switch ($_POST['route']) {
                case "create_user":
                    $user = new Users();
                    $user->createUser();
                    break;
                case "create_kid":
                    $kid = new Kids();
                    $kid->createKidbag();
                    break;
                case "login":
                    $user = new Users();
                    $user->login();
                    break;
            }
       }
       
       else if($method == "GET" &&  isSet($_GET['route']) ){
           switch ($_GET['route']) {
                  case "get_users":
                    $user = new Users();
                    $user->getAll();
                    break;
        
                 case "create_report":
                    $kids= new Kids();
                    $kids -> createKidAlergicreport();
                    break;
            }
       }
 

    



?>

