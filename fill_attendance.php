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
    
    $sql = "select * from kids
            join users on kids.parentId=users.parentId;";
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
        <script src="commons.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <title>Attendance</title>
    </head>

    <body>
        <header>
                <templateHtml src="picture-container/picture-container.html"></templateHtml>
                <?php include "nav-menu/nav-menu-container.php" ?>
        </header>
        <h1> Daily Attendance </h1>
        
        <section id="daily-attendance">
            <form>
                <div class="pickDateField">
                    <label for="pick-date"> Today date: </label>
                    <input name="date" type="date" value="<?php echo date('Y-m-d'); ?>" disabled/> 
                </div>                 

                <table id="attendance-table">
                    <tr>
                        <th> Last Name </th>
                        <th> First Name </th>
                        <th> ID </th>                 
                        <th> Attendance ? </th>
                        <th> Send SMS Now </th>
                    </tr>

                    <?php if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {?>
                            <tr>
                                <td> <?php echo $row['lastname']; ?> </td>               
                                <td> <?php echo $row['fname']; ?> </td>
                                <td class='kidId'> <?php echo $row['kidId']; ?> </td> 
                                <td class='attendance'> <input type="checkbox" checked data-toggle="toggle" data-onstyle="warning" data-offstyle="info"> </td>
                                <td> <input type="button" value="Send" class="send-button" onClick="sendSMS()"/> </td>
                            </tr>
                        <?php    
                        }
                    }
                    ?>



                </table>
                <script src="fill_attendance.js"></script>
                <input type="button" value="Update Attendance" class="refresh-button" onClick="saveInServer()"/>  
                <script>
                    function saveInServer(){
                        var loopLength = $("#attendance-table tr").length 
                        var updateKids = []
                        for(var i=0; i<loopLength; i++){//insert all the kids that we need to update to one list
                            var tr = $('#attendance-table tr:eq(' + i + ')')
                            var kidId = tr.find('.kidId').text()
                            var attendance = tr.find('.attendance input').is(':checked')
                            
                            if(!attendance && kidId){
                                updateKids.push(kidId)
                            }
                            // updateKids.
                        }


                        var sql = 'DELETE FROM noattendance WHERE date=CURRENT_DATE(); '
                        for(var i=0; i<updateKids.length; i++){
                            sql += ' insert into noattendance (date,kidId) values (current_date(),' + updateKids[0] + '); '
                        }


                        location.href = 'updateNoattendance.php?sql=' + sql
                        
                    }
                </script>     
            </form>
        </section>

       

        <!-- <?php
        echo date("l jS \of F Y h:i:s A") . "<br>";
            $today = date("F j, Y, g:i a");      
        ?> -->

      
    </body>

</html>