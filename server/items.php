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

                $sql = "SELECT items.itemCategory, items.itemName, items.unitPrice FROM items WHERE items.itemCategory='{$_GET['itemCategory']}' 
                AND items.itemName='{$_GET['itemName']}' AND '{$_GET['quantity']}'  <> '' ";
                $result =$this->db->query($sql); 
                if($result){
                    // $data= [];
                    // while($row = mysqli_fetch_array($result)){
                    //         array_push($data, (object) [
                    //         'category' => $row['items.itemCategory'],
                    //         'Item_Name' => $row['items.itemName'],
                    //         'Quantity' => $row['quantity'],
                    //         'unitPrice' => $row['items.unitPrice'],
                    //         ]);
                    //     }
                        while ($row  = $result->fetch_assoc() ) {
                            $data[] = $row;
                        }
                    
                    echo json_encode((object) [
                        'data' => $data,
                        'success'=>true
                    ]);
                }

                else{
                    $this->error();
                }
            }       

    // public function createItemsTable(){
    //     if($_GET['optionsReport'] == 'allergies-report'){
    //         $this->getItems();
    //     }
    // }
    
} 
?>
                

           