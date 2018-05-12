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
        <link rel="stylesheet" type="text/css" href="css/queries.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/bootstrap/js/bootpopup.min.js"></script>

<title>Update Child File </title>
</head>

<body onload="showKindergartenkid()">
    <header>
        <templateHtml src="logo-container/logo-container.html"></templateHtml>
        <?php include "nav-menu/nav-menu-container.php" ?>
     </header>

<!-- kid section -->
<section id="kid-choosen">
    <form>
        <h2> Child File </h2>
        <p class="success-message2"></p>
        <div class="row kid-form1">
             <div class="col span-1-of-2 box">
                 <div class="registration-info">
                    <label for="kidname" id="kidname-label"> Child Name: </label> <br>
                        <select name="kidOptions" size="1" id="kidname"></select>
                 </div>
            </div>
        </div>
        <button type="button" class="show-kid-details btn btn-warning" onClick="showInfoAboutakidList()"> Load File </button>
    </form>
</section>

<section id="kidList-detailsUpdate">
        <form>
                <div class="row kid-form1">
                 <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label  for="name"> <span> * </span>  First Name: </label> <br>
                        <input name="fname" type="name" id="name" class="disabled-input"/>
                    </div>
                </div>
                  <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label  for="name"> <span> * </span>  Last Name: </label> <br>
                        <input name="lastname" type="name" id="kidlastname" class="disabled-input"/>
                    </div>
                </div>
                 <div class="col span-1-of-3 box">
                     <div class="registration-info">
                        <label for="id"> <span> * </span> ID: </label> <br>
                        <input name="kidId" type="text" id="kid-id" class="disabled-input"/>
                     </div>
                </div>
           </div>
           <div class="row kid-form2">
                   <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label> <span> * </span> Gender: </label>
                            <select name="genders" size="1" class="disabled-input"> 
                                <option value="boy" selected> Boy  </option>
                                <option value="Girl"> Girl </option>
                            </select>
                        </div>
                   </div>
                   <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="data"> <span> * </span> Date of birth: </label>
                        <input name="bDate" type="date" id="birth-date" class="disabled-input">
                    </div>
                </div> 
           </div>

           <div class="row kid-form3">
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <label for="name"> Allergies: </label>   
                        <p> <input type="checkbox" name="celiac" class="disabled-input"> Celiac </p>
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="eggs" class="disabled-input"> Eggs </p>                  
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="fish" class="disabled-input"> Fish </p>                  
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="kiwis" class="disabled-input"> Kiwis </p>                  
                    </div>
                </div>
           </div>
           <div class="row kid-form3">
                <div class="col span-1-of-4 box"> 
                     <div class="registration-info"> 
                        <p> <input type="checkbox" name="lactoseintolerance" class="disabled-input"> Lactose intolerance </p>                  
                     </div>
                </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p> <input type="checkbox" name="nuts" class="disabled-input"> Nuts </p>
                    </div>
           </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info">   
                         <p> <input type="checkbox" name="soy" class="disabled-input"> Soy </p>                  
                    </div>
           </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info"> 
                        <p> <input type="checkbox" name="strawberries" class="disabled-input"> Strawberries </p>                  
                    </div>
           </div>
           </div>
           <div class="row kid-form3">
                <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="food"> Food Preference: </label>   
                        <p> <input type="radio" name="vegan" class="disabled-input"> Vegan </p>                  
                    </div>
                </div>
                <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="food"> </label>   
                        <p class="food-pref"> <input type="radio" name="vegetarian" class="disabled-input"> Vegetarian </p>                  
                    </div>
                </div>
           </div>
           <div class="row kid-form4">
                <div class="col span-1-of-2 box">
                     <div class="registration-info">
                        <label> Comments and Special Requests: </label>
                        <textarea name="comments" cols="83" rows="4" style="overflow:auto;resize:none" class="disabled-input"> </textarea>
                     </div>
                </div>
            </div>
            <button type="button" id="new-observation" class="btn btn-warning"> Add observation to child file </button>
     </form>  
</section>

<section id="kid-observation">
    <form>
        <p class="success-message"></p>
            <div class="row kid-update1">
                 <div class="col span-1-of-2 box">
                    <div class="update-info">
                        <label  for="name"> Observations list: </label> <br>
                        <select name="observation" size="1" id="observation"> 
                                <option class="observation-value1" value="" selected> Please pick from list... </option>
                                <option class="observation-value1" value="child argued with another kid"> Your child argued with another kid </option>
                                <option class="observation-value1" value="child didn't eat breakfest"> Your child didn't eat breakfest </option>
                                <option class="observation-value1" value="child didn't eat lunch"> Your child didn't eat lunch </option>
                                <option class="observation-value1" value="please call the kindergarten teacher as soon as possible"> Please call the kindergarten teacher as soon as possible </option>
                                <option class="observation-value1" value="child didn't feel good during the day"> Your child didn't feel good during the day </option>
                                <option class="observation-value1" value="child did not sleep well"> Your child didn't sleep well </option> //חדש  
                                <option class="observation-value1" value="child did not drink enough water"> Your child did not drink enough water </option>  
                                <option class="observation-value1" value="child has been rude to the kindergarten teacher"> Your child has been rude to the kindergarten teacher </option>
                                <option class="observation-value2" value="child enjoyed painting activity"> Your child enjoyed painting activity </option>
                                <option class="observation-value2" value="child enjoyed solving puzzle activity"> Your child enjoyed solving puzzle activity </option>
                                <option class="observation-value2" value="child helped another kid"> Your child helped another kid </option>
                                <option class="observation-value2" value="child likes to hear stories"> Your child likes to hear stories </option>
                                <option class="observation-value2" value="child took part in the activities"> Your child took part in the activities </option> 
                                <option class="observation-value2" value="please bring a new set of clothes"> Please bring a new set of clothes </option> 
                                <option class="observation-value2" value="child behaved very well today"> Your child behaved very well today </option>
                        </select>
                    </div>
                </div>
                <div class="col span-1-of-2 box">
                    <div class="update-info">
                        <label id="pickDate"> <span> * </span> Pick date: </label>
                        <input name="observationDate" type="date" id="upDate" />
                    </div>
                </div>
           </div>
           <div class="row kid-update2">
                <div class="col span-1-of-2 box">
                     <div class="update-info">
                        <label>  Comments: </label>
                        <textarea name="SpecialRequests" cols="88" rows="4" style="overflow:auto;resize:none"> </textarea>
                     </div>
                </div>
            </div>
            <button type="button" class="save-details btn btn-warning" onClick="DetailskidUpdate()"> Save</button>
            <button type="button" class="exit btn btn-warning"> <a href="/Sadna/index.php" id="special-link"> Exit </a> </button>
        </form>
</section>
    
    <script src="commons.js"></script>
    <script src="js/kid_detailsUpdate.js"></script>
    <script src="main.js"></script>

        <footer class="container-fluid text-center bg-lightgray">
            <div class="copyrights" style="margin-top:18px;">
                <p>Copyright &copy; Karin Haim Poor, Imry Noy And Daniel Ben-Moshe
                    <br>
            </div>
        </footer>   
</body>

</html>