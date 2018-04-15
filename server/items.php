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

    private function getTotalItems(){
                // $sql = "INSERT INTO kids (fname,kidId,bDate,genders,celiac,eggs,fish,
                // kiwis,lactoseintolerance,nuts,soy,strawberries,vegan,vegetarian,comments,parentId) VALUES ($values)";
                $this->allowSpecialCharacters($_GET);
                
                $sql = "SELECT itemCategory, itemName, unitPrice FROM items WHERE itemCategory='{$_GET['Category']}' 
                AND itemName='{$_GET['item']}' AND '{$_GET['quantity']}' <> '' ";
                $result =$this->db->query($sql); 
                if($result){
                    $data= [];
                    while($row = mysqli_fetch_array($result)){
                        
                       
                            array_push($data, (object) [
                            'category' => $row['itemCategory'],
                            'Item_Name' => $row['itemName'],
                            'Quantity' => $row['quantity'],
                            'unitPrice' => $row['unitPrice'],
                            ]);
                      
                    }
                    echo json_encode((object) [
                        'data' => $data,
                        'success'=>true
                    ]);
                }
                else{
                    echo json_encode((object) [
                        'error'=>true
                    ]);
                }
    }

    // public function createItemsTable(){
    //     if($_GET['optionsReport'] == 'allergies-report'){
    //         $this->getItems();
    //     }
    // }

}
?>
                

           