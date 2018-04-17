  // conditions for the selects
  document.getElementById("artitems").style.display = "none";
  document.getElementById("officeitems").style.display = "none";
  document.getElementById("fooditems").style.display = "none";
  
function SelectCategory(){
    var category = document.getElementById("itemcategory").value;
    var emptyitem = document.getElementById("empty");
    var aitem = document.getElementById("artitems");
    var oitem = document.getElementById("officeitems");
    var fitem = document.getElementById("fooditems");
    
    if(category == "Artmaterials")
        {
        aitem.style.display = "inline-block";
        oitem.style.display = "none";
        fitem.style.display = "none";
        emptyitem.style.display = "none";
        }
    else{
        if(category == "Office"){
            aitem.style.display = "none";
            oitem.style.display = "inline-block";
            fitem.style.display = "none";
            emptyitem.style.display = "none";
        }
        
        else{
                aitem.style.display = "none";
                oitem.style.display = "none";
                fitem.style.display = "inline-block";
                emptyitem.style.display = "none";
        }
        }
        
        if(category == "Empty"){
        aitem.style.display = "none";
        oitem.style.display = "none";
        fitem.style.display = "none";
        emptyitem.style.display = "inline-block";
        }
    }
  
  // end of conditions for the selects


  
function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row + '<th>'+item+'</th>';
    })
    return row + '</tr>';
}

function createItemsTable(data){
    var tableElement = document.getElementById("item-table");
    var table='';

    table = table + buildThs(['Category', 'Item Name','Quantity', 'Price']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.itemCategory+'</td><td>' + item.itemName + '</td><td>'+item.quantity+'</td><td>'+item.unitPrice+'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}

function getItemList(){

    var data = getFormData("#shopping-list form");
    console.log(data)
    httpGet("/Sadna/server/api.php?route=getItems",data, function(response) {
        if(response.success && response.data instanceof Array){
            createItemsTable(response.data);
        }

    })

}