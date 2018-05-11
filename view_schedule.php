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
                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>

                <link rel='stylesheet' href='lib/fullcalendar.css' />
                <script src='lib/moment.min.js'></script>
                <script src='lib/fullcalendar.js'></script>
                <script type='text/javascript' src='lib/gcal.js'></script>

        <title> Weekly Schedule </title>
     
    </head>

    <body>
        <header>
            <templateHtml src="logo-container/logo-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <section id="Weekly-Scheduler">
 
            <h1> Weekly Schedule </h1>
            <p class="describe-list-info"> Just click on event and add it to your private calendar</p> <br>

                <div id="viewCalendar">
                </div>
                <script src="js/view_schedule.js"> </script>
                <script src="commons.js"></script>      
        </section> 
               
        <footer class="container-fluid text-center bg-lightgray">
            <div class="copyrights" style="margin-top:18px;">
                <p>Copyright &copy; Karin Haim Poor, Imry Noy And Daniel Ben-Moshe
                    <br>
            </div>
        </footer>

    </body>

</html>