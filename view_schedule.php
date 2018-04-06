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

        <title>Building Weekly Scheduler</title>
        
    </head>

    <body>
        <header>
            <templateHtml src="picture-container/picture-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <section id="Weekly-Scheduler">
 
            <h1> View Weekly Scheduler </h1>
                <div id="calendar">
                </div>
                <script src="view_schedule.js"> </script>    
        </section>        
                
                <br><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=[event-title]&dates=[start-custom format='Ymd\\THi00\\Z']/[end-custom format='Ymd\\THi00\\Z']&details=[description]&location=[location]&trp=false&sprop=&sprop=name:" target="_blank" rel="nofollow"><button type="button" class="save-1"> Add To My Calendar </button></a>         

        


        <script src="commons.js"></script>
        
        
    </body>

</html>