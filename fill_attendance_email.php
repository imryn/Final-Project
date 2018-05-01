<?php
        $to      = $_GET['email'];//'karinhp1@gmail.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: karinhp1@gmail.com' . "\r\n" .
        'Reply-To: karinhp1@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        header('Location: http://www.ynet.co.il');

        // http://localhost/Sadna/fill_attendance_email.php?email=asd@asd.com
?> 