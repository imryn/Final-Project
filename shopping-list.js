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

function createTable(data){
    console.log(data)
    var tableElement = document.getElementById("item-table");
    var table='';

    table = table + buildThs(['Item_Name','Quantity']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.item+'</td><td>' + item.quantity + '</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}

function getReports(){

    var data = getFormData("#shopping-list form");

   
    httpGet("/Sadna/server/api.php?route=create_table",data, function(response) {
        if(response.data instanceof Array){
            createTable(response.data);
        }

    })

}