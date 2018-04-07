<?php
    private function getItems(){
        $sql = "SELECT items.item, items.quantity FROM items <> '' ";
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
?>
                

           