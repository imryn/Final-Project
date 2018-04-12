<?php

 session_start();

if(isSet($_SESSION['login']) && isSet($_SESSION['token']) &&  $_SESSION['token'] == $_SESSION['login']){
    include "login-nav-menu.php";
}
else{
    session_destroy();
    include "nav-menu.php";
}

?>