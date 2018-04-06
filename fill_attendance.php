<!DOCTYPE html>
<html>

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
            crossorigin="anonymous"></script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

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
        
        <section>
            <form>
                <div class="col span-1-of-2 box">
                    <div class="report-info">
                        <label for="start-date"> Pick date: </label>
                        <input name="startDate" type="date"/>
                    </div>
                </div> 
                
                <input type="button" value="create" class="create-botton" onClick="getReports()"/>
            </form>
                <table id="kids-table"></table>
                <script src="commons.js"></script>
                <script src="fill_attendance.js"></script>
        </section>

        <input type="checkbox" data-toggle="toggle" data-onstyle="warning" data-offstyle="info">

        <!-- <?php
        echo date("l jS \of F Y h:i:s A") . "<br>";
            $today = date("F j, Y, g:i a");      
        ?> -->

      
    </body>

</html>