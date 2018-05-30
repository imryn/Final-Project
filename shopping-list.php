<?php
session_start();
include 'server/crew.php';
$crew = new Crew();
if( !$crew->isLogin() ) {
    header('location:login_page.php?usertype=crew');
}
include 'server/items.php';
$items = new Items();
$shoppingitems = $items->getItemsFromShoppingListHistory();
?>
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
                 <p class="describe-list-info"> Add items to cart:</p>
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
                    <input type="button" value="Add" id="add" title="Add item to list" class="btn btn-warning add-to-cart" disabled onClick="getItemList()" />
                <input type="hidden" name="kindergardenid" value="<?php  echo $_SESSION['kindergardenid']; ?>">
            </form>
            <div>
                <h2 class="shopping-header"> Cart</h2>
            </div>
            <table id="cart-table" class="table table-striped table-responsive w-auto">
                <tr>
                    <th>Category - Item</th>
                    <th>Qty</th>
                    <th class="colDisplay">Unit Price</th>
                    <th class="colDisplay">Total</th>
                    <th>Purchased</th>
                    <th>Delete</th>
                </tr>
                <?php
                $cartTotal = 0;
                foreach ( $shoppingitems as $item_id => $item ){
                    $itemTotal = $item['unitPrice'] * $item['quantity'];
                    if( $item['purchased'] == 0 && $item['isremoved'] == 0) {
                        ?>
                        <tr class="table-info" id="item_cart_row_<?php echo $item['id']; ?>">
                            <td><?php echo $item['itemCategory']; ?> - <?php echo $item['itemName']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td class="colDisplay"> &#x20AA; <?php echo $item['unitPrice']; ?> </td>
                            <td class="colDisplay"> &#x20AA; <?php echo $item['unitPrice'] * $item['quantity']; ?></td>
                            <td class="purchase_col">
                                <button title="Mark as purchased and remove from cart" 
                                        class="btn btn-success purchase-item"
                                        data-price="<?php echo $item['unitPrice'] * $item['quantity']; ?>"
                                        data-id="<?php echo $item['id']; ?>">Purchase</button>
                            </td>
                            <td>
                                <button title="Remove from list" 
                                        class="btn btn-danger delete-from-cart"
                                        data-type="cart"
                                        data-id="<?php echo $item['id']; ?>"
                                        data-item-total="<?php echo $itemTotal;?>">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $cartTotal = $cartTotal + $itemTotal;
                    }
                    //$_SESSION['cart_total'] = $cartTotal;
                }
                ?>
            </table>

            <form>
                <div class="pickDateField">
                    <span> Total: </span>
                    <strong>&#x20AA;</strong> <strong class="cart_total"><?php echo $cartTotal; ?></strong>
                </div>
            </form>
            <h2 class="shopping-header">Shopping list history</h2>
            <table id="shopping-table" class="table table-striped table-responsive w-auto">
                <tr>
                    <th>Category - Item</th>
                    <th>Qty</th>
                    <th class="colDisplay">Unit Price</th>
                    <th class="colDisplay">Total</th>
                    <th>Delete</th>
                </tr>
                <?php
                $shoppingHistoryTotal = 0;
                foreach ( $shoppingitems as $item_id => $item ){
                    $itemTotal = $item['unitPrice'] * $item['quantity'];
                    if( $item['purchased'] == 1 && $item['isremoved'] == 0 ) {
                        ?>
                        <tr class="table-info" id="item_cart_row_<?php echo $item['id']; ?>" data-type="shopping">
                            <td><?php echo $item['itemCategory']; ?> - <?php echo $item['itemName']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td class="colDisplay"> &#x20AA; <?php echo $item['unitPrice']; ?> </td>
                            <td class="colDisplay"> &#x20AA; <?php echo $item['unitPrice'] * $item['quantity']; ?></td>
                            <td>
                                <button title="Remove from list"
                                        class="btn btn-danger delete-from-cart"
                                        data-type="shopping"
                                        data-id="<?php echo $item['id']; ?>"
                                        data-item-total="<?php echo $itemTotal;?>">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $shoppingHistoryTotal = $shoppingHistoryTotal + $itemTotal;
                    }

                    //$_SESSION['shopping_history_total'] = $shoppingHistoryTotal;
                }

                $_SESSION['shopping_cart_total'] = $cartTotal + $shoppingHistoryTotal;
                ?>
            </table>
            <form>
                <div class="pickDateField">
                    <span> Total: </span>
                    <strong>&#x20AA;</strong> <strong class="shopping_total"><?php echo $shoppingHistoryTotal; ?></strong>
                </div>
            </form>
            <div>
                <button title="Clear history and renew budget"
                        class="btn btn-warning clear_shopping_history"
                        data-item-total="<?php echo $itemTotal;?>">Clear History And Renew Budget</button>
            </div>
            <div>
                <p class="shopping-money-exp">
                    Total: <strong>&#x20AA;</strong> <strong class="shopping_cart_total"><?php echo $_SESSION['shopping_cart_total']; ?></strong>
                </p>
                <p class="shopping-money-exp">
                    Budget: <strong>&#x20AA; <?php echo $_SESSION['shoppingbudget'] ; ?></strong>
                </p>
                <p class="shopping-money-exp">
                    Remain:<strong>&#x20AA;</strong> <strong class="shopping_cart_remain"><?php echo $_SESSION['shoppingbudget'] - $_SESSION['shopping_cart_total']; ?></strong>
                </p>
            </div>

    </section>
    <footer class="container-fluid text-center bg-lightgray">
      <div class="copyrights" style="margin-top:18px;">
      <p>Copyright &copy; 2018 Karin Haim Pour, Imry Noy And Daniel Ben-Moshe . All rights reserved </p>
      </div>
    </footer>

        <script src="js/shopping-list.js"></script>
        <script src="commons.js"></script>   
       
</body>
</html>