<!DOCTYPE html>
<html>
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
    
    $sql = "select * from 
            (select 
                    fname,
                    users.kindergartenid as kindergartenid,
                    users.lastname as lastname,
                    kids.kidId as kidId,
                    kids.parentId as parentId,
                    'true' as comeToClass 
                from kids
                join users on kids.parentId=users.parentId
                where kids.parentId not in (select parentId from noattendance where date=current_date())

                union 

                select 
                    fname,
                    users.kindergartenid as kindergartenid,
                    users.lastname as lastname,
                    kids.kidId as kidId,
                    kids.parentId as parentId,
                    'false' as comeToClass 
                from kids
                join users on kids.parentId=users.parentId
                where kids.parentId in (select parentId from noattendance where date=current_date())
            )a order by lastname 

";
    $result = $conn->query($sql);

    $conn->close();
        ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/nav-menu.css">
        <link rel="stylesheet" type="text/css" href="picture-container/picture-container.css">
        <link rel="stylesheet" type="text/css" href="css/queries.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <title>Attendance</title>
    </head>

    <body>
        <header>
                <templateHtml src="logo-container/logo-container.html"></templateHtml>
                <?php include "nav-menu/nav-menu-container.php" ?>
        </header>
       
        
        <section id="daily-attendance">
          <h1> Daily Attendance </h1>
            <form>
                <div class="pickDateField">
                    <label for="pick-date"> Today Attendance: </label>
                    <input name="date" type="text" value="<?php echo date('Y-m-d'); ?>" disabled/> 
                </div>                 

                <table id="attendance-table" class="table table-striped">
                    <tr>
                        <th> No. </th>
                        <th> Child Name </th>               
                        <th> Attendance ? </th>
                        <th> Reminder </th>
                    </tr>

                    <?php if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        $counter=1;
                        while($row = $result->fetch_assoc()) {?>
                            <tr>
                                <td> <?php echo $counter; ?></td>
                                <td> <?php echo $row['lastname']; 
                                        echo $row['fname']; ?> 
                                </td>                                                              
                                <td style="display:none;" class='kidId'> <?php echo $row['kidId']; ?> </td> 
                                <td class='attendance'>
                                    <input data-height="15" 
                                    <?php if($row['comeToClass']=='true')
                                    {echo 'checked';}
                                    else{echo '';}; ?>
                                    type="checkbox" data-toggle="toggle">
                                </td>
                                <td> <input type="button" checked value="Send" class="send-button btn btn-warning" onClick="sendEmail()"/> </td>
                                <td style="display:none;" class='parentId'> <?php echo $row['parentId']; ?> </td>
                                <td style="display:none;" class='kindergartenid'> <?php echo $row['kindergartenid']; ?> </td>                             
                                <?php $counter++; ?>
                            </tr>
                        <?php    
                        }
                    }
                    ?>
                </table>

                <input type="button" value="Update Attendance" class="refresh-button btn btn-warning" onClick="saveInServer()"/>             
            </form>
        </section>


        <script src="commons.js"></script>
        <script src="js/fill_attendance.js"></script>        
    </body>

</html>