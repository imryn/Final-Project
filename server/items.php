<?php   
          require_once('db.php');

          class Items{
              
              function __construct() {
                  $db =  DB::getInstance();
                  $this->db = $db->getConnection();
              }
      
              private function error(){
                  echo json_encode((object) [
                      'error'=>true
                  ]);
              }

    private function getItems(){
        $values = "'{$_POST['Artmaterials']}','{$_POST['Food']}','{$_POST['Office']}','{$_POST['Crayons-24']}',
                '{$_POST['Crayons-200']}','{$_POST['Glue-stick']}','{$_POST['Glue-liquid-100ml']}','{$_POST['Glue-liquid-300ml']}',
                '{$_POST['Glue-liquid-1kg']}','{$_POST['Paper-blue-A3']}','{$_POST['Paper-green-A3']}','{$_POST['Paper-red-A3']}',
                '{$_POST['Paper-white-A3']}','{$_POST['Paper-yellow-A3']}','{$_POST['Paper-blue-A4']}','{$_POST['Paper-green-A4']}',
                '{$_POST['Paper-red-A4']}','{$_POST['Paper-white-A4']}','{$_POST['Paper-yellow-A4']}','{$_POST['folder']}',
                '{$_POST['notebook']}','{$_POST['Pens-black']}','{$_POST['Pens-blue']}','{$_POST['Pens-red']}','{$_POST['perforated']}',
                '{$_POST['rubber-bands']}','{$_POST['stapler']}','{$_POST['staples']}','{$_POST['apples']}','{$_POST['bread']}',
                '{$_POST['butter']}','{$_POST['wh-cheese-5%']}','{$_POST['ye-cheese']}','{$_POST['chocolate']}','{$_POST['cucumber']}',
                '{$_POST['grape-juice']}','{$_POST['lettuce']}','{$_POST['olives']}','{$_POST['onion']}','{$_POST['pepper-green']}',
                '{$_POST['pepper-red']}','{$_POST['pepper-yellow']}','{$_POST['pickles']}','{$_POST['raspberry-juice']}','{$_POST['tomato']}',
                '{$_POST['tehina']}','{$_POST['tuna']}','{$_POST['quantity']}'";

                // $sql = "INSERT INTO kids (fname,kidId,bDate,genders,celiac,eggs,fish,
                // kiwis,lactoseintolerance,nuts,soy,strawberries,vegan,vegetarian,comments,parentId) VALUES ($values)";
        $sql = "INSERT INTO itemsitem, items.quantity  <> '' ";
                $result =$this->db->query($sql); 
                if($result){
                    $data= [];
                    while($row = mysqli_fetch_array($result)){
                        
                       
                            array_push($data, (object) [
                            'Item_Name' => $row['item'],
                            'Quantity' => $row['quantity']
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

    public function createItemsTable(){
        if($_GET['optionsReport'] == 'allergies-report'){
            $this->getItems();
        }
    }

}
?>
                

           