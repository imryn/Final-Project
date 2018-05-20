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
$email = $row['email'];

$url = 'https://api.sendgrid.com/';
$user = 'karinhp1';
$pass = 'khp12345678';


$json_string = array(

  'to' => array(
        $email
),
  'category' => 'test_category'
);


$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'x-smtpapi' => json_encode($json_string),
    'to'        => 'example3@sendgrid.com',
    'subject'   => 'testing from curl',
    'html'      => "Hello {$email}",
    'text'      => "Hello {$email}",
    'from'      => 'example@sendgrid.com',
  );

$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
// print_r($response);
// echo $email;
        
header('Location: http://sadna.byethost33.com/fill_attendance.php');

?> 