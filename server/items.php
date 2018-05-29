<?php
require_once('db.php');

class Items{
              
    function __construct() {
      $db =  DB::getInstance();
      $this->db = $db->getConnection();
    }

    private function allowSpecialCharacters($method){
        foreach( $method as $key => $value ) {
                 $method[$key] = strip_tags($this->db->real_escape_string($value));
        }
    }
      
    private function error(){
      echo json_encode((object) [
          'error'=>true
      ]);
    }

    public function getTotalItems(){
        $this->allowSpecialCharacters($_GET);

        $sql = "SELECT items.id, items.itemCategory, items.itemName, items.unitPrice FROM items WHERE items.itemCategory='{$_GET['itemCategory']}' 
        AND items.itemName='{$_GET['itemName']}' OR items.itemName='{$_GET['itemName1']}' OR items.itemName='{$_GET['itemName2']}' <> '' ";
        $result = $this->db->query($sql);
        if( $result ) {
            $data = [];
            $row = mysqli_fetch_array($result);
            $itemTotal = $_GET['quantity'] * $row['unitPrice'];
            // add item only if not exceed total budget
            if ( $_SESSION['shopping_cart_total'] + $itemTotal <= $_SESSION['shoppingbudget']) {
                $_SESSION['shopping_cart_total'] += $itemTotal;
                $average = $this->getItemsAverageFromShoppingListHistory($row['id']);
                // add item to shopping cart table
                $shopping_list_id = $this->addItemToShoppingListHistory($row['id'], $_GET['quantity']);
                array_push($data, (object)[
                    'id' => $shopping_list_id,
                    'itemID' => $row['id'],
                    'itemCategory' => $row['itemCategory'],
                    'itemName' => $row['itemName'],
                    'quantity' => $_GET['quantity'],
                    'unitPrice' => $row['unitPrice'],
                    'average' => $average
                ]);
                echo json_encode((object) [
                    'data' => $data,
                    'success'=>true
                ]);
            } else {
                echo json_encode((object) [
                    'data' => array(),
                    'success'=>false
                ]);
            }

        }
        else {
            $this->error();
        }
    }


    public function removeItemFromCart( $id, $itemTotal, $send_response = true ) {
        $_SESSION['shopping_cart_total'] -= $itemTotal;
        $sql = "DELETE FROM shoppinghistory WHERE id=$id";
        $this->db->query( $sql );
        if( $send_response ) {
            echo json_encode((object)[
                'success' => true
            ]);
        }
    }

    public function updateItemStatus( $id ) {
        $sql = "UPDATE shoppinghistory SET purchased=1 WHERE id=$id";
        $this->db->query( $sql );
        echo json_encode((object) [
            'success' => true
        ]);
    }

    public function updateQuantity( $id, $quantity, $unitPrice ) {
        $itemTotal = $quantity * $unitPrice;
        if ( $_SESSION['shopping_cart_total'] + $itemTotal <= $_SESSION['shoppingbudget']) {
            $sql = "UPDATE shoppinghistory SET quantity=$quantity WHERE id=$id";
            $this->db->query($sql);
            echo json_encode((object)[
                'success' => true
            ]);
        } else {
            $this->removeItemFromCart( $id,  $itemTotal, false );
            echo json_encode((object)[
                'success' => false
            ]);
        }
    }

    public function addItemToShoppingListHistory( $item_id, $quantity ) {
        //unset( $_SESSION[ 'cart_item_'.$item_id ] );
        $kindergartenid = $_SESSION[ 'kindergartenid' ];
        $sql = "INSERT INTO shoppinghistory (itemID, quantity, kindergartenid) VALUES ( $item_id, $quantity, $kindergartenid )";
        $this->db->query( $sql );
        return $this->db->insert_id;

    }



    public function getItemsFromShoppingListHistory(  ) {
        $kindergartenid = $_SESSION[ 'kindergartenid' ];
        $sql = "SELECT 
                shoppinghistory.id,
                shoppinghistory.itemID,
                shoppinghistory.quantity,
                shoppinghistory.purchased,
                shoppinghistory.isremoved,
                items.itemCategory,
                items.itemName,
                items.unitPrice
                FROM shoppinghistory LEFT JOIN items
                ON shoppinghistory.itemID = items.id
                WHERE shoppinghistory.kindergartenid=$kindergartenid";
        $results = $this->db->query( $sql );
        return $results->fetch_all( MYSQLI_ASSOC );
    }

    // return the average quantity from last shopping
    public function getItemsAverageFromShoppingListHistory( $item_id ) {
        $kindergartenid = $_SESSION[ 'kindergartenid' ];
        $select = "SELECT quantity FROM shoppinghistory WHERE itemID={$item_id} AND purchased=1 AND kindergartenid=$kindergartenid";
        $result = $this->db->query( $select );
        $average = 0;
        $counter = 0;
        $sum = 0;
        while( $row = mysqli_fetch_array($result) ){
            $sum += $row['quantity'];
            $counter++;
        }
        if( $counter > 0 ) {
            $average = $sum/$counter;
        }
        return $average;
    }

    public function clearShoppingHistory() {
        $kindergartenid = $_SESSION[ 'kindergartenid' ];
        $sql = "UPDATE shoppinghistory SET isremoved=1 WHERE kindergartenid=$kindergartenid AND purchased=1 AND isremoved=0";
        $this->db->query( $sql );
        echo json_encode((object)[
            'success' => true
        ]);
    }
} 
?>
                

           