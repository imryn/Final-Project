<?php
        $servername = "us-cdbr-gcp-east-01.cleardb.net";
        $username = "b1cecd1cfb136f";
        $password = "7e767b54";
        $dbname = "gcp_69477eab26f5d4ebcd7f";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

        $sql="SELECT users.email as email
                FROM users 
                join kids on kids.parentId=users.parentId
                WHERE kidId=".$_GET['id']."  ";

        $result = $conn->query($sql);

        $conn->close();

        $row = mysqli_fetch_assoc($result);

        $to      =  'karinhp1@gmail.com';//$row['email'];//
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: karinhp1@gmail.com' . "\r\n" .
        'Reply-To: karinhp1@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $success = mail($to, $subject, $message, $headers);

        if (!$success) {
        $errorMessage = error_get_last()['message'];
        }
        echo $errorMessage;
        
        // header('Location: http://www.ynet.co.il');

        // http://localhost/Sadna/fill_attendance_email.php?id=301522940
?> 