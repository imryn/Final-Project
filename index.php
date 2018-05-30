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
        <link rel="stylesheet" type="text/css" href="css/incdex-pictures.css">
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

        <div class="container">

<!-- Page Heading -->
<section id="index-section">
<div class="row template-row">
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <img class="card-img-top" src="pictures/initiative-shopping-lists.jpg" alt="shopping-carts">
      <div class="card-body">
        <h4 class="card-title">
          <h3 class="template-header"> Shopping List <h3>
        </h4>
        <p class="card-text" id="first-temp-p"> 
          As a kindergarten worker, you will be able to manage a shopping list
          by adding art materials, food and office supplies in order to 
          save money, improve efficiency and bring more quality equipment to the kindergarten.
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <img class="card-img-top" src="pictures/schedule.png" alt="">
      <div class="card-body">
        <h4 class="card-title">
        <h3 class="template-header"> Weekly Schedule </h3>
        </h4>
        <p class="card-text"> 
          As a kindergarten worker, you can manage your kindergarten schedule, so the parents will be able
          to trace it and add the planned meals and activities to their private google calendar.
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <img class="card-img-top" src="pictures/New-business-report.jpg"alt="">
      <div class="card-body">
        <h4 class="card-title">
        <h3 class="template-header"> Reports </h3>
        </h4>
        <p class="card-text"> 
          As a kindergarten worker/parent,you will be able to track any information about the children
          such as allergies and observations given by the kindergarten teacher - our reports will do that for you.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row template-row">
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <img class="card-img-top" src="pictures/Role-call.jpg" alt="">
      <div class="card-body">
        <h4 class="card-title">
        <h3 class="template-header"> Daily Attendance </h3>
        </h4>
        <p class="card-text">
          As a kindergarten worker, you can fill out a daily attendance and to follow each 
          morning which of the children is missing and send Email to child' parent in order to request an update.
      </p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <img class="card-img-top" src="pictures/portfolio.jpg" alt="">
      <div class="card-body">
        <h4 class="card-title">
        <h3 class="template-header"> User Management </h3>
        </h4>
        <p class="card-text">
          As a kindergarten worker, you can add observations about child behaviour, 
          good or bad, in order to get his parent more informed.
          Parent will be able to update his "Child file" and also inform kindergarten teacher about a new issue.
        </p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <iframe class="card-img-top" src="https://www.youtube.com/embed/0R0V-fvTAz4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen alt="marketing-video"></iframe>
      <div class="card-body">
        <h4 class="card-title">
        <h3 class="template-header"> Marketing Video </h3>
        </h4>
        <!-- <p class="card-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
          Itaque earum nostrum suscipit ducimus nihil provident, 
          perferendis rem illo, voluptate atque, sit eius in voluptates, 
          nemo repellat fugiat excepturi! Nemo, esse.
        </p> -->
      </div>
    </div>
  </div>
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