<?php 
//  $servername = "us-cdbr-gcp-east-01.cleardb.net";
//  $username = "b1cecd1cfb136f";
//  $password = "7e767b54";
//  $dbname = "gcp_69477eab26f5d4ebcd7f";
 
//  // Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname);
//  // Check connection
//  if ($conn->connect_error) {
//      die("Connection failed: " . $conn->connect_error);
//  } 
 
//  $sql = "DELETE FROM noattendance WHERE date=CURRENT_DATE(); insert into noattendance (date,kidId) values (current_date(), 300043312 ); insert into noattendance (date,kidId) values (current_date(), 300043312 );";
//  $sql = "insert into noattendance (date,kidId) values (current_date(), 300043312 ); insert into noattendance (date,kidId) values (current_date(), 300043312 );";
// // $updateIds = array(explode(",", $_GET["updateIds"]));
// //  foreach ($updateIds as &$value) {
//     // echo $value;
//     // echo 55555;
// // }
//  echo $_GET['sql'];
// //  $result = $conn->query($_GET['sql']);
//  $result = $conn->query($sql);

//  $conn->close();
?>




<?php
$con=mysqli_connect("us-cdbr-gcp-east-01.cleardb.net","b1cecd1cfb136f","7e767b54","gcp_69477eab26f5d4ebcd7f");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql =  $_GET['sql'];

// Execute multi query
if (mysqli_multi_query($con,$sql))
{
  do
    {
    // Store first result set
    if ($result=mysqli_store_result($con)) {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
        printf("%s\n",$row[0]);
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

mysqli_close($con);
header("Location: fill_attendance.php");

?>

