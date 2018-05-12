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
        <title> Shopping List</title>
    </head>

    <body>
        <header>
            <templateHtml src="logo-container/logo-container.html"></templateHtml>        
            <?php include "nav-menu/nav-menu-container.php" ?>
           
        </header>
        <section id="shopping-list">
            <form>
                 <h1> Shopping List</h1>
                 <p class="describe-list-info"> Add items to shopping list:</p>      
                 <div class="row shoppinglist-form3">
                    <div class="col span-1-of-4 box">
                        <div class="list-info">
                            <label id="category">Category: </label> 
                            <select name="itemCategory" size="1" id="itemcategory" onchange="SelectCategory(this.value);" > 
                                <option value="Empty" > --Select Category--  </option>
                                <option value="Art materials"> Art materials  </option>
                                <option value="Office" > Office  </option>
                                <option value="Food" > Food  </option>
                            </select>
                        </div>
                     </div>
                
                <div class="col span-1-of-5 box">
                    <div class="list-info">
                        <label id="item"> Item: </label>  

                        <select disabled name="item" size="0" id="empty">  </select>

                        <select name="itemName" size="1" id="artitems"> 
                            <option value="" > --Select Item--  </option>
                            <option value="Crayons (package of 24)"> Crayons (package of 24)</option>
                            <option value="Crayons (package of 200)" > Crayons (package of 200)  </option>
                            <option value="Glue-stick (package of 5)" > Glue-stick (package of 5)  </option>
                            <option value="Glue-liquid-100ml (package of 3)" > Glue-liquid-100ml (package of 3)  </option>
                            <option value="Glue-liquid-300ml" > Glue-liquid-300ml  </option>
                            <option value="Glue-liquid-1liter" > Glue-liquid-1liter  </option>
                            <option value="Paper-blue-A3 (package of 500)" > Paper-blue-A3 (package of 500)  </option>
                            <option value="Paper-green-A3 (package of 500)" > Paper-green-A3 (package of 500)  </option>
                            <option value="Paper-red-A3 (package of 500)" > Paper-red-A3 (package of 500)  </option>
                            <option value="Paper-white-A3 (package of 500)" > Paper-white-A3 (package of 500)  </option>
                            <option value="Paper-yellow-A3 (package of 500)" > Paper-Yellow-A3 (package of 500)  </option>
                            <option value="Paper-blue-A4 (package of 500)" > Paper-blue-A4 (package of 500)  </option>
                            <option value="Paper-green-A4 (package of 500)" > Paper-green-A4 (package of 500)  </option>
                            <option value="Paper-red-A4 (package of 500)" > Paper-red-A4 (package of 500)  </option>
                            <option value="Paper-white-A4 (package of 500)" > Paper-white-A4 (package of 500)  </option>
                            <option value="Paper-yellow-A4 (package of 500)" > Paper-Yellow-A4 (package of 500)  </option>
                        </select>
                    
                        <select name="itemName1" size="1" id="officeitems" > 
                                <option value="" > --Select Item--  </option>
                                <option value="Folder"> Folder  </option>
                                <option value="Notebook"> Notebook </option>
                                <option value="Pens-black (package of 10)" > Pens-black (package of 10)  </option>
                                <option value="Pens-blue (package of 10)" > Pens-blue (package of 10)  </option>
                                <option value="Pens-red (package of 10)" > Pens-red (package of 10)  </option>
                                <option value="Perforated"> Perforated  </option>
                                <option value="Rubber bands (package of 50)"> Rubber bands (package of 50)  </option>
                                <option value="Stapler"> Stapler  </option>
                                <option value="Staples"> Staples  </option>
                        </select>
            
                        <select name="itemName2" size="1" id="fooditems" > 
                                <option value="" > --Select Item--  </option>
                                <option value="Apples"> Apples (kg)  </option>
                                <option value="Bread" > Bread  </option>
                                <option value="Butter spread" > Butter spread  </option>
                                <option value="Cheese-white-5%-500gram"> Cheese-white-5%-500gram  </option>
                                <option value="Cheese-yellow-400gram" > Cheese-yellow-400gram  </option>
                                <option value="Chocolate spread-500gram" > Chocolate spread-500gram  </option>
                                <option value="Cucumber (kg)"> Cucumber (kg)  </option>
                                <option value="Grape juice syrup 1 liter" > Grape juice syrup 1 liter  </option>
                                <option value="Hummus-500gram" > Hummus-500gram (kg)  </option>
                                <option value="Lettuce (kg)" > Lettuce (kg) </option>
                                <option value="Olives (can)"> Olives (can)  </option>
                                <option value="Onion (kg)" > Onion (kg)  </option>
                                <option value="Pepper-green (kg)" > Pepper-green (kg)  </option>
                                <option value="Pepper-red (kg)" > Pepper-red (kg) </option>
                                <option value="Pepper-yellow (kg)" > Pepper-yellow (kg) </option>
                                <option value="Pickles (can)" > Pickles (can)  </option>
                                <option value="Raspberry juice syrup 1 liter" > Raspberry juice syrup 1 liter  </option>
                                <option value="Tomato (kg)" > Tomato (kg)  </option>
                                <option value="Tehina-500gram (kg)" > Tehina-500gram (kg)  </option>
                                <option value="Tuna (package of 4)" > Tuna (package of 4)  </option>
                        </select>
                    </div>
                </div>
                        <div class="col span-1-of-2 box">
                            <div class="list-info">
                                <label id="quantity"> Quantity: </label> 
                                <input type="number" name="quantity" min="1" max="10" id="quantity-input">
                            </div>
                        </div>
                </div>
                    <input type="button" value="Add" id="add" class="btn btn-warning add-to-cart" disabled onClick="getItemList()"/>
            </form>  
            <table id="item-table" class="table table-striped table-responsive w-auto">
                <tr>
                    <th>Category - Item</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Done</th>
                    <th>Delete</th>
                </tr>
                <?php

                $sumTotal=0;
                foreach ($_SESSION as $item_id => $item ){
                    if( strpos($item_id, 'cart_item_' ) !== false ) 
                    {
                        $arr = explode( '_', $item_id );
                        $id = end( $arr );
                        ?>
                        <tr class="table-info" id="item_cart_row_<?php echo $id; ?>">
                            <td><?php echo $item[0]->itemCategory; ?> - <?php echo $item[0]->itemName; ?></td>
                            <td><?php echo $item[0]->quantity; ?></td>
                            <td> &#x20AA; <?php echo $item[0]->unitPrice; ?> </td>
                            <td> &#x20AA; <?php echo $item[0]->unitPrice * $item[0]->quantity; ?></td>
                            <td><button class="btn btn-success save-item-to-sl-history" data-id="<?php echo $id; ?>" data-quantity="<?php echo $item[0]->quantity; ?>">Done</button></td>
                            <td><button class="btn btn-danger delete-from-cart" data-id="<?php echo $id; ?>" onclick="myFunction()" >Delete</button></td>
                        </tr>
                        <tr>   <?php  $sumTotal=$sumTotal + ($item[0]->unitPrice * $item[0]->quantity); ?>                
                        </tr>
                        <?php
                    }
                 
                }
                ?>
            </table>

            <form>
                <div class="pickDateField">
                    <label for="pick-date"> Total: </label>
                    <input name="date" type="text" value="&#x20AA;  <?php echo $sumTotal; ?>" disabled/> 
                </div>
    </section>

            
            <!-- // $servername = "us-cdbr-gcp-east-01.cleardb.net"; //
            // $username = "b1cecd1cfb136f";
            // $password = "7e767b54";
            // $dbname = "gcp_69477eab26f5d4ebcd7f";
            
            // // Create connection
            // $conn = new mysqli($servername, $username, $password, $dbname);
            // // Check connection
            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // } 

            // $sql = "SELECT unitPrice FROM items";
            // $result = $conn->query($sql);

            // if ($result->num_rows > 0) {
                
            //     // output data of each row
            //     while($row = $result->fetch_assoc()) {
            //         echo "<tr><td>" . $row["itemCategory"]. "</td><td>" . $row["ItemName"]. "</td><td>" . $row[" "]. "</td><td>" . $row["unitPrice"]. " </td><td>" . $row[" "]. "</td></tr>";
            //     }
            //     echo "</table>";
            // } else {
            //     echo "0 results";
            // }

            // $conn->close(); ?> -->
           
        

        <footer class="container-fluid text-center bg-lightgray">
            <div class="copyrights" style="margin-top:18px;">
                <p>Copyright &copy; Karin Haim Poor, Imry Noy And Daniel Ben-Moshe
                    <br>
            </div>
        </footer>
        <script src="js/shopping-list.js"></script>
        <script src="commons.js"></script>       
</body>
</html>