<?php

       include 'new-user.php';
       include 'kids.php';
       include 'exceptions.php';
       include 'items.php';

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
                case "observation_error":
                    $exceptions = new Exceptions();
                    $exceptions->DetailsUpdate();
                    break;
                case "update_kid":
                    $kid = new Kids();
                    $kid->updateKidbag();
                    break;
                case "create_table":
                    $items = new Items();
                    $items->createItemsTable();
            }
       }
       
       else if($method == "GET" &&  isSet($_GET['route']) ){
           switch ($_GET['route']) {
                 case "get_users":
                    $user = new Users();
                    $user->getAll();
                    break;
        
                 case "get_Alergicreport":
                    $kids= new Kids();
                    $kids -> getAllallergies();
                    break;
                //case "logout":
                //  session_destroy();
                //  break;
                case "get_Exceptionsreport":
                    $kids= new Kids();
                    $kids -> getAllExceptions();
                    break;

                 case "getKidInfo":
                    $kids= new Kids();
                    $kids -> showInfoAboutakid();
                    break;
            }
       }
?>

