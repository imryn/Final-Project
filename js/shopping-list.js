  // Start - conditions for the selects
  document.getElementById("artitems").style.display = "none";
  document.getElementById("officeitems").style.display = "none";
  document.getElementById("fooditems").style.display = "none";
  
function SelectCategory(){
    var category =  $('#itemcategory').val();
    
    if(category == "Artmaterials") {
        $('#artitems').css('display', "inline-block");
        $('#artitems').prop('disabled', false);

        $('#officeitems').css('display', "none");
        $('#officeitems').prop('disabled', true);
        $('#officeitems option:eq(0)').prop('selected', true);

        $('#fooditems').css('display', "none");
        $('#fooditems').prop('disabled', true);
        $('#fooditems option:eq(0)').prop('selected', true);

        $('#empty').css('display', "none");
        $('#empty').prop('disabled', true);
    }
    else if(category == "Office") {
        $('#artitems').css('display', "none");
        $('#artitems').prop('disabled', true);
        $('#artitems option:eq(0)').prop('selected', true);

        $('#officeitems').css('display', "inline-block");
        $('#officeitems').prop('disabled', false);

        $('#fooditems').css('display', "none");
        $('#fooditems').prop('disabled', true);
        $('#fooditems option:eq(0)').prop('selected', true);

        $('#empty').css('display', "none");
        $('#empty').prop('disabled', true);

    } else if(category == "Food") {
        $('#artitems').css('display', "none");
        $('#artitems').prop('disabled', true);
        $('#artitems option:eq(0)').prop('selected', true);

        $('#officeitems').css('display', "none");
        $('#officeitems').prop('disabled', true);
        $('#officeitems option:eq(0)').prop('selected', true);

        $('#fooditems').css('display', "inline-block");
        $('#fooditems').prop('disabled', false);

        $('#empty').css('display', "none");
        $('#empty').prop('disabled', true);
    }
    /*if(category == "Empty"){
        aitem.style.display = "none";
        oitem.style.display = "none";
        fitem.style.display = "none";
        emptyitem.style.display = "inline-block";
    }*/
}
  
  // End - conditions for the selects

$('.delete-from-cart').on('click', function(){
    var item_id = $(this).data('id');
    $('#item_cart_row_'+item_id).remove();
});
  
function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row + '<th scope="row">'+item+'</th>';
    })
    return row + '</tr>';
}

var tableElement = document.getElementById("item-table").tableElement.length;

function createItemsTable(data){
    
    var table='';

    //table = table + buildThs(['Category', 'Item Name','Quantity', 'Price']);
    var total = 0;
    data.forEach(function(item) {
        total = item.quantity * item.unitPrice;
        table = '<tr class="table-info">' +
                    '<td>' + item.itemCategory + '</td>' +
                    '<td>' + item.itemName + '</td>' +
                    '<td>' + item.quantity + '</td>' +
                    '<td>' + item.unitPrice + '</td>' +
                    '<td>' + total + '</td>' +
                '</tr>';
        $('#item-table').append(table);
    });
    
    
    tableElement.innerHTML = table;
    console.log(table)
}

function getItemList(){
    var data = getFormData("#shopping-list form");
    console.log(data);
    httpGet("/Sadna/server/api.php?route=getItems",data, function(response) {
        if(response.success && response.data instanceof Array){
            createItemsTable( response.data );
        }

    })

}


/*
var onStartCreateTable = true;

function createItemsTable(data){
    
    if(onStartCreateTable){
        var table = buildThs(['Category', 'Item Name','Quantity', 'Price']);
        onStartCreateTable =  false;
        $('#item-table').append(table);
    }
    
    
    data.forEach(function(item) {
        var table = '<tr class="table-info"><td>'+item.itemCategory+'</td><td>' + item.itemName + '</td><td>'+item.quantity+'</td><td>'
        + item.unitPrice+'</td></tr>';
        $('#item-table').append(table);
    });
    console.log(table)
}
*/

