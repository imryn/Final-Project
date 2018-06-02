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
        <link rel="stylesheet" type="text/css" href="css/queries.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
        <title>Kidin Touch</title>
    </head>

<body>
       <header>
            <templateHtml src="logo-container/logo-container.html"></templateHtml>
            <?php include "weather/api.php" ?>
            <?php include "nav-menu/nav-menu-container.php" ?>
       </header>

<!-- Page Heading -->
<section id="about-section">
  <h1> About </h1>
  <div class="container-fluid bg-3">    
    <div class="about-form row">
      <div class="col-sm-4">
        <img id="about-picture" src="pictures/kids-plays.jpg" alt="kids plays">
      </div>
      <p id="about-exp">
        Welcome to &#34;Kidin Touch&#34; ,a new information system for private kindergartens.<br>
        Developed and designed specifically to meet the needs of staff members in order to be more efficient, organized and to
        fulfill the goal of strengthening the connection with the parents and monitoring their children in the kindergarten - &#34;Kidin Touch&#34; was built to be your all-in-one solution.<br>
        In time studies, &#34;Kidin Touch&#34; saves as much as one hour per day per staff member. More time for what matters!<br><br>
        No installation, setup fees or training required. And no more paper to buy! Works on any device. <br> <br>
        Real-time updates between kindergarten&acute;s staff members, parents and across devices - iPhone,Android, and web.
      </p>  
    </div>
  </div>
  
</section>

    <footer class="container-fluid text-center bg-lightgray">
      <div class="copyrights" style="margin-top:18px;">
      <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Daniel Ben-Moshe . All rights reserved </p>
      </div>
    </footer>
    

       <script src="commons.js"></script>
</body>

</html>