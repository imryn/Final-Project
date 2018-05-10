<?php

       include 'new-user.php';
       include 'kids.php';
       include 'crew.php';
       include 'exceptions.php';
       include 'items.php';
       include 'presence.php';
       
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
                    if($_POST['usertype'] == 'parent'){
                        $user = new Users();
                        $user->login();
                    }
                    else if($_POST['usertype'] == 'crew'){
                        $crew = new Crew();
                        $crew->loginForkindergartenTeacher();
                    }
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
                    break;
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

                case "signout":
                 if(isset( $_SESSION['parentId'])){
                    session_destroy();
                    header("Location: /Sadna/login_page.php?usertype=parent");
                 }
                 else{
                    session_destroy();
                    header("Location: /Sadna/login_page.php?usertype=crew");
                 }
                 break;

                case "get_Exceptionsreport":
                    $exceptions= new Exceptions();
                    $exceptions -> getAllExceptions();
                    break;
                
                case "get_Exceptionsgraph":
                    $exceptions= new Exceptions();
                    $exceptions -> getAllExceptionsInGraph();
                    break;

                case "get_Presencereport":
                    $presence= new Presence();
                    $presence -> getPresence();
                    break;
                    

                 case "getKidInfo":
                    $kids= new Kids();
                    $kids -> showInfoAboutakid();
                    break;
                
                case "getKidListInfo":
                    $kids = new Kids();
                    $kids -> showInfoAboutchoosenkid();
                    break;

                case "getKindergartenkid":
                    $kids= new Kids();
                    if(isSet($_SESSION['kTeacherId'])){
                        $kids -> showKindergartenkidsList();
                    }
                    else{
                        $kids -> showkid();
                    }
                    break;

                case "getItems":
                    $items=new Items(); 
                    $items->getTotalItems();
                    break;
                
                case "removeItemFromCart":
                   $items = new Items();
                   $items->removeItemFromCart( $_GET['item_id'] );
                   break;
                case "addItemToShoppingListHistory":
                   $items = new Items();
                   $items->addItemToShoppingListHistory( $_GET['item_id'], $_GET['quantity'] );
                   break;

            }
       }
       else{
           echo "no find any route";
       }
?>

