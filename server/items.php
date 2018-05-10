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
            while($row = mysqli_fetch_array($result)){
                $average = $this->getItemsAverageFromShoppingListHistory($row['id'] );
                array_push( $data, (object) [
                    'itemId' => $row['id'],
                    'itemCategory' => $row['itemCategory'],
                    'itemName' => $row['itemName'],
                    'quantity' => $_GET['quantity'],
                    'unitPrice' => $row['unitPrice'],
                    'average' => $average
                ]);
                $_SESSION[ 'cart_item_'.$row['id'] ] = $data;
            }
            echo json_encode((object) [
                'data' => $data,
                'success'=>true
            ]);
        }
        else {
            $this->error();
        }
    }


    public function removeItemFromCart( $item_id ) {
        unset( $_SESSION[ 'cart_item_'.$item_id ] );
        echo json_encode((object) [
            'success' => true
        ]);
    }

    public function addItemToShoppingListHistory( $item_id, $quantity ) {
        unset( $_SESSION[ 'cart_item_'.$item_id ] );
        $sql = "INSERT INTO shoppinghistory (itemID, quantity) VALUES ( $item_id, $quantity )";
        $this->db->query( $sql );
        echo json_encode((object) [
            'success' => true
        ]);
    }

    // return the average quantity from last shopping
    public function getItemsAverageFromShoppingListHistory( $item_id ) {
        $select = " SELECT quantity FROM shoppinghistory WHERE itemID={$item_id}";
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
} 
?>
                

           