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

        <title>Registration</title>
    </head>

    <body>
        <header>
            <templateHtml src="logo-container/logo-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

    <section id="registration-parent">
            <form>
                <h1> Registration</h1>
                <h2><u> Parent </u></h2>
                <p class="describe-info"> Please fill in your personal details: </p>
                <p class="success-message"></p>
                <div class="row parent-form1">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="kindergarten"> <span> * </span> Kindergarten Code </label>
                            <input name="kindergartenid" type="text" required/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="name"> <span> * </span> First Name: </label>
                            <input name="firstname" type="text" required/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="name"> <span> * </span> Last Name: </label>
                            <input name="lastname" type="text" required/> 
                        </div>
                    </div> 
                </div>
                <div class="row parent-form2">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="id" id="parent-id"> <span> * </span> ID: </label> <br>
                            <input name="parentId" type="text" required>
                        </div>    
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="password"> <span> * </span> Password: </label> <br>
                            <input name="password" type="password" id="password" required/>
                        </div> 
                    </div>
                </div>
                <div class="row parent-form3">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="address" id="address"> Address: </label> <br>
                            <input name="addressuser" type="text"/> 
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label id="city"> City, Country: </label> <br>
                                <div id="pac-container">
                                    <input id="pac-input" name="city" type="text">
                                </div>
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                            <div class="registration-info">
                                    <label for="email"> <span> * </span> Email Address: </label> <br>
                                    <input name="email" type="email" required/ id="email-input">
                            </div>
                    </div>
                </div>
                    <div class="row parent-form4">
                        <div class="col span-1-of-3 box">
                                <div class="registration-info">
                                    <label for="phone" id="phone"> Phone No.: </label> <br>
                                    <input name="phone" type="phone" /> 
                                </div>
                        </div>
                        <div class="col span-1-of-3 box">
                                <div class="registration-info">
                                    <label for="phone" id="parent-phone"> <span> * </span> Cell Phone No.: </label>
                                    <input name="mobilephone" type="phone" id="phone" required/> 
                                </div>
                        </div>
                        <div class="col span-1-of-1 box">
                                <div class="registration-info">
                                        <label> <span> * </span> Family Member: </label> <br>
                                        <select name="familyMember" size="1" id="f-member-select" > 
                                                <option value="empty" selected> Select...  </option>
                                                <option value="Father"> Father  </option>
                                                <option value="Mother"> Mother </option>
                                        </select>
                                </div>
                        </div> 
                </div>
                <div class="row parent-form4">
                    <div class="col span-1-of-3 box">
                            <div class="registration-info">
                                <label>  <span> * </span> Addition Contact: </label> <br>
                                <input name="anothercontact" type="text" required/> 
                            </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label> <span> * </span> Relationship:  </label>
                            <input name="relationship" type="text" required/> 
                        </div>
                    </div> 
                    <div class="col span-1-of-3 box">
                            <div class="registration-info">
                                <label for="phone"> <span> * </span> Cell Phone No.: </label>
                                <input name="mobilephone2" type="phone" required/> 
                            </div>
                    </div>    
                </div>
        </form> 
    </section>


    <!-- kid section -->
    <section id="registration-kid">
        <form>
            <h2> <u> Kid </u></h2>
            <p class="describe-info"> Please fill in your child details: </p>
            <p class="success-message2"></p>
                <div class="row kid-form1">
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label  for="name"> <span> * </span>  First name: </label> <br>
                            <input name="fname" type="name" id="name"/>
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="id"> <span> * </span> ID: </label> <br>
                            <input name="kidId" type="text" id="kid-id">
                        </div>
                    </div>
                    <div class="col span-1-of-3 box">
                        <div class="registration-info">
                            <label for="data"> <span> * </span> Date of birth: </label>
                            <input name="bDate" type="date" id="birth-date">
                        </div>
                    </div> 
            </div>
            <div class="row kid-form2">
                    <div class="col span-1-of-1 box">
                            <div class="registration-info">
                                <label> <span> * </span> Gender: </label>
                                <select name="genders" size="1" id="gender"> 
                                    <option value="empty" selected> Select...  </option>
                                    <option value="boy"> Male </option>
                                    <option value="Girl"> Female </option>
                                </select>
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
                            <label>  Comments and Special Requests: </label>
                            <textarea name="comments" cols="84" rows="4" style="overflow:auto;resize:none"> </textarea>
                        </div>
                    </div>
            </div>
                <button type="button" class="save-2 btn btn-warning" onClick="createParentUser()"> Save</button>   
        </form>  
    </section>
        <script src="commons.js"></script>
        <script src="main.js"></script>
        <script src="js/location.js"> </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBheLjhOReAW-Y5Ki1P3MxNHVRW5K6yY-8
        &libraries=places&callback=initMap"
            async defer></script>

            <footer class="container-fluid text-center bg-lightgray">
                <div class="copyrights" style="margin-top:18px;">
                    <p>Copyright &copy; Karin Haim Poor, Imry Noy And Daniel Ben-Moshe
                        <br>
                </div>
            </footer>        
    </body>

</html>