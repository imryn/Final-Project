<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="shortcut icon" type="image/x-icon" href="/logo-container/favicon.ico">
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

        <title>Update Weekly Schedule</title>
        
    </head>

    <body>
        <header>
            <templateHtml src="logo-container/logo-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <section id="Weekly-Scheduler">
 
            <form>
                <h1> Update Weekly Schedule </h1>


                <div class="calendar_row">
                    <div id="calendar">
                       <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffcc66&amp;src=sadnakidintouch%40gmail.com&amp;color=%231B887A&amp;src=iw.jewish%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FJerusalem" style="border:solid 1px #777" width="700" height="600" frameborder="0" scrolling="no"></iframe>
                   </div>
                </div>
     
                <div class="row schduler_holder">
            
                    <div class="col span-1-of-4 box" class="schedule_row">
                        <div class="scheduler-description">
                            <label for="data" class="pick"> Pick a date: </label>
                            <input name="Date" type="date" id="date" />
                        </div>
                    </div>
                    <div class="col span-1-of-4 box" class="schedule_row">
                        <div class="scheduler-description" id="bf">
                        
                            <label for="Breakfast">  Breakfast: </label> 
                            <input name="Breakfast" id="bfInput" type="text" /> 
                            
                            <!-- Button code -->
                            <div title="Add to Calendar" class="addeventatc"> 
                                Add
                                <span class="start" id="startb"><!-- start from jquery --></span>
                                <span class="end" id="endb"><!-- end from jquery --></span>
                                <span class="timezone">Asia/Jerusalem</span>
                                <span class="title">Breakfast</span>
                                <span class="description"><!-- description from jquery --></span>
                            </div>                    
                        </div>
                    </div>

                    <div class="col span-1-of-4 box" class="schedule_row">
                          <div class="scheduler-description" id="ea">
                            <label for="Educational">  Educational Activity: </label>
                            <input name="Educational" id='eaInput' type="text" /> 

                            <!-- Button code -->
                            <div title="Add to Calendar" class="addeventatc"> 
                                Add
                                <span class="start" id="starte"><!-- start from jquery --></span>
                                <span class="end" id="ende"><!-- end from jquery --></span>
                                <span class="timezone">Asia/Jerusalem</span>
                                <span class="title">Educational Activity</span>
                                <span class="description"><!-- description from jquery --></span>
                            </div>                        
                        </div>
                    </div>

                    <div class="col span-1-of-4 box" class="schedule_row">
                        <div class="scheduler-description" id="ln">                            
                            <label for="Lunch">  Lunch: </label>
                            <input name="Lunch" id='lInput' type="text" /> 

                            <!-- Button code -->
                            <div title="Add to Calendar" class="addeventatc"> 
                                Add  
                                <span class="start" id="startl"><!-- start from jquery --></span>
                                <span class="end" id="endl"><!-- end from jquery --></span>
                                <span class="timezone">Asia/Jerusalem</span>
                                <span class="title">Lunch</span>
                                <span class="description"><!-- description from jquery --></span>
                            </div>
                         </div>
                    </div>    

                    <div class="col span-1-of-4 box" class="schedule_row">
                        <div class="scheduler-description" id="se">                            
                            <label for="Lunch">  Special Event: </label>
                            <input name="Lunch" id='seInput' type="text" /> 

                            <!-- Button code -->
                            <div title="Add to Calendar" class="addeventatc"> 
                                Add  
                                <span class="start" id="startse"><!-- start from jquery --></span>
                                <span class="end" id="endse"><!-- end from jquery --></span>
                                <span class="timezone">Asia/Jerusalem</span>
                                <span class="title">Special Event</span>
                                <span class="description"><!-- description from jquery --></span>
                                <!-- <span class="all_day_event">true</span> -->
                            </div>
                         </div>
                    </div>                    
                </div>
            </form>
        </section>
    <script src="js/Building_Schedule.js"></script>
    <footer class="container-fluid text-center bg-lightgray">
      <div class="copyrights" style="margin-top:18px;">
      <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Daniel Ben-Moshe . All rights reserved </p>
      </div>
    </footer>
    </body>

</html>