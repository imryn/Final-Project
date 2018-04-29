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
        <script src="vendors/bootstrap/js/bootpopup.min.js"></script>

<title>Update Child File </title>
</head>

<body onload="showInfoAboutakid()">
    <header>
        <templateHtml src="logo-container/logo-container.html"></templateHtml>
        <templateHtml src="picture-container/picture-container.html"></templateHtml>
        <?php include "nav-menu/nav-menu-container.php" ?>
     </header>

<!-- kid section -->
<section id="kid-detailsUpdate">
    <form>
        <h2> Child File</h2>
        <p class="describe-info"> Update your child details: </p>
        <p class="success-message2"></p>
            <div class="row kid-form1">
                 <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label  for="name"> <span> * </span>  First Name: </label> <br>
                        <input name="fname" type="name" id="name"/>
                    </div>
                </div>
                  <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label  for="name"> <span> * </span>  Last Name: </label> <br>
                        <input name="lastname" type="name" id="kidlastname"/>
                    </div>
                </div>
                 <div class="col span-1-of-3 box">
                     <div class="registration-info">
                        <label for="id"> <span> * </span> ID: </label> <br>
                        <input disabled class="disabled-input" name="kidId" type="text" id="kid-id" />
                     </div>
                </div>
           </div>
           <div class="row kid-form2">
                   <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label> <span> * </span> Gender: </label>
                            <select name="genders" size="1"> 
                                <option value="boy" selected> Boy  </option>
                                <option value="Girl"> Girl </option>
                            </select>
                        </div>
                   </div>
                   <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="data"> <span> * </span> Date of birth: </label>
                        <input name="bDate" type="date" id="birth-date">
                    </div>
                </div> 
           </div>

           <div class="row kid-form3">
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <label for="name"> Allergies: </label>   
                        <p> <input type="checkbox" name="celiac"> Celiac </p>
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="eggs"> Eggs </p>                  
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="fish"> Fish </p>                  
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p class="allergie-info"> <input type="checkbox" name="kiwis"> Kiwis </p>                  
                    </div>
                </div>
           </div>
           <div class="row kid-form3">
                <div class="col span-1-of-4 box"> 
                     <div class="registration-info"> 
                        <p> <input type="checkbox" name="lactoseintolerance"> Lactose intolerance </p>                  
                     </div>
                </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info">
                        <p> <input type="checkbox" name="nuts"> Nuts </p>
                    </div>
           </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info">   
                         <p> <input type="checkbox" name="soy"> Soy </p>                  
                    </div>
           </div>
           <div class="col span-1-of-4 box">
                    <div class="registration-info"> 
                        <p> <input type="checkbox" name="strawberries"> Strawberries </p>                  
                    </div>
           </div>
           </div>
           <div class="row kid-form3">
                <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="food"> Food Preference: </label>   
                        <p> <input type="radio" name="vegan"> Vegan </p>                  
                    </div>
                </div>
                <div class="col span-1-of-3 box">
                    <div class="registration-info">
                        <label for="food"> </label>   
                        <p class="food-pref"> <input type="radio" name="vegetarian"> Vegetarian </p>                  
                    </div>
                </div>
           </div>
           <div class="row kid-form4">
                <div class="col span-1-of-2 box">
                     <div class="registration-info">
                        <label> Comments and Special Requests: </label>
                        <textarea name="comments" cols="83" rows="4" style="overflow:auto;resize:none"> </textarea>
                     </div>
                </div>
            </div>
            <button type="button" class="update-details btn btn-warning" onClick="savingChangesinKidbag()"> Update </button>
            <!-- <button type="button" id="new-observation"> Kindergarten teacher's comments </button> -->
     </form>  
</section>

<!-- <section id="kid-observation">
    <form>
        <p class="success-message"></p>
            <div class="row kid-update1">
                 <div class="col span-1-of-2 box">
                    <div class="update-info">
                        <label  for="name"> Please enter new observation: </label> <br>
                        <select name="observation" size="1" id="observation"> 
                                <option class="observation-value1" value="child argued with another kid"> Child argued with another kid </option>
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
                                <option class="observation-value2" value="child behaved very well today"> Child behaved very well today </option>
                        </select>
                    </div>
                </div>
                <div class="col span-1-of-2 box">
                    <div class="update-info">
                        <label id="pickDate"> <span> * </span> Pick The Date: </label>
                        <input name="observationDate" type="date" id="upDate" />
                    </div>
                </div>
           </div>
           <div class="row kid-update2">
                <div class="col span-1-of-2 box">
                     <div class="update-info">
                        <label>  Comments </label>
                        <textarea name="SpecialRequests" cols="76" rows="4" style="overflow:auto;resize:none"> </textarea>
                     </div>
                </div>
            </div>
            <button type="button" class="save-details" onClick="DetailskidUpdate()"> Save</button>
            <button type="button" class="exit"> <a href="/Sadna/index.php" id="special-link"> Exit </a> </button>
        </form>
</section> -->
    
    <script src="commons.js"></script>
    <script src="js/kid_detailsUpdate.js"></script>
    <script src="main.js"></script>
</body>

</html>