  // Start - conditions for the selects
  document.getElementById("artitems").style.display = "none";
  document.getElementById("officeitems").style.display = "none";
  document.getElementById("fooditems").style.display = "none";
  
function SelectCategory(){
    var category =  $('#itemcategory').val();
    
    if(category == "Art materials") {
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

    function refreshTotal() {
        location.reload();
    }
    /*if(category == "Empty"){
        aitem.style.display = "none";
        oitem.style.display = "none";
        fitem.style.display = "none";
        emptyitem.style.display = "inline-block";
    }*/
}
  
  // End - conditions for the selects
$( document ).on('click', '.delete-from-cart', function(){
    var id = $(this).data('id');
    var type = $(this).data('type'); // type = cart or shopping ( to know from which table to delete this row )
    var itemTotal = parseInt( $(this).data('item-total') );
    httpGet("/Sadna/server/api.php?route=removeItemFromCart",  { 'id': id, 'itemTotal': itemTotal }, function(response) {
        if( response.success ){

            $('#item_cart_row_'+id).remove();
            var currentVal = 0;
            // update total according to type - can be cart_total OR shopping_total
            if( type === "cart" ) {
                currentVal = parseInt($('.cart_total').html());
                $('.cart_total').html("" + (currentVal - itemTotal));
            } else if( type === "shopping" ) {
                currentVal = parseInt($('.shopping_total').html());
                $('.shopping_total').html("" + (currentVal - itemTotal));
            }
            // update total and remain values
            currentVal = parseInt($('.shopping_cart_total').html());
            $('.shopping_cart_total').html("" + (currentVal - itemTotal));

            currentVal = parseInt($('.shopping_cart_remain').html());
            $('.shopping_cart_remain').html("" + (currentVal + itemTotal));
        }
    })

});

  $( document ).on('click', '.purchase-item', function(){
      var id = $(this).data('id');
      var price = $(this).data('price'); // = quantity * itemPrice
      httpGet("/Sadna/server/api.php?route=updateItemStatus", { 'id': id } , function(response) {
          if( response.success ){
              // move the table-row from cart-table to shopping table
              var tr = $('#item_cart_row_'+id).remove().clone();
              // remove the purchase column
              tr.find('.purchase_col').remove();
              // update the delete type to shopping
              tr.find('.delete-from-cart').data('type', 'shopping');
              // append to shopping-table
              $('#shopping-table').append( tr );

              var currentVal = parseInt($('.cart_total').html());
              $('.cart_total').html("" + (currentVal - price));


              currentVal = parseInt($('.shopping_total').html());
              $('.shopping_total').html("" + (currentVal + price));
          }
      })
  });

$(".clear_shopping_history").on('click', function(){
    httpGet("/Sadna/server/api.php?route=clear_shopping_history" , function(response) {
        if( response.success ){
            window.location.reload();
        }
    });
});


$('#quantity-input').on( 'change', function(){
    if( parseInt( $( this ).val() ) > 0 ) {
        // enable the "add" button when the quantity is greater than 0
        $('.add-to-cart').attr( 'disabled', false );
    }
});

function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row + '<th scope="row">'+item+'</th>';
    })
    return row + '</tr>';
}


function createItemsTable(data){
    
    var table = '';
    //table = table + buildThs(['Category', 'Item Name','Quantity', 'Price']);
    var total = 0;
    data.forEach(function(item) {
        console.log( item );
        var average = Math.floor( parseFloat( item.average ) );
        var quantity = parseInt( item.quantity);
        var range = 2;
        var is_vail = false;
        if( average > 0 && ( average > (  quantity + range ) || average < ( quantity - range ) ) ){
            if( confirm( "The average quantity purchased for this item is " + average + ". Would you like to update to average quantity?") ) {
                item.quantity = Math.floor( average );
                //location.reload();
                httpGet("/Sadna/server/api.php?route=updateItemQuantity", { 'id': item.id, 'quantity': item.average, 'unitPrice': item.unitPrice }, function ( response ) {
                    if (response.success === true ) {
                        addTableRowItem(item);
                    } else {
                        alert("You exceeded budget");
                    }
                })
            } else {
                is_vail = true;
            }
        }  else {
            is_vail = true;
        }

        if( is_vail === true ) {
            addTableRowItem(item);
        }
    });
}

function addTableRowItem( item ) {
    $('#quantity-input').val(0);
    itemTotal = item.quantity * item.unitPrice;
    table = '<tr class="table-info" id="item_cart_row_' + item.id + '">' +
        '<td>' + item.itemCategory + '-' + item.itemName + '</td>' +
        '<td>' + item.quantity + '</td>' +
        '<td class="colDisplay">&#x20AA;' + item.unitPrice + '</td>' +
        '<td class="colDisplay">&#x20AA;' + itemTotal + '</td>' +
        '<td class="purchase_col"> <button title="Mark as purchased and remove from cart" class="btn btn-success purchase-item" data-id="' + item.id + '" data-price="' + itemTotal + '"> Purchase </button></td>' +
        '<td> <button title="Remove from list" class="btn btn-danger delete-from-cart" data-id="' + item.id + '" data-item-total="' + itemTotal + '" data-type="cart">Delete</button></td>' +
        '</tr>';
    $('#cart-table').append(table);

    var currentVal = parseInt($('.cart_total').html());
    $('.cart_total').html("" + (currentVal + itemTotal));
    currentVal = parseInt($('.shopping_cart_total').html());
    $('.shopping_cart_total').html( currentVal + itemTotal );
    currentVal = parseInt($('.shopping_cart_remain').html());
    $('.shopping_cart_remain').html( currentVal - itemTotal );
}

function getItemList(){
    var data = getFormData("#shopping-list form");
    //console.log(data);
    httpGet("/Sadna/server/api.php?route=getItems", data, function (response) {
        if ( response.data instanceof Array) {
            if( response.success === true ) {
                createItemsTable(response.data);
            } else {
                alert("You exceeded budget");
            }
        }
    })

    //  location.reload();
}
