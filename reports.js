


function getReports(){

    var data = getFormData("#reports form");
    data['route'] = 'create_report';
    httpPost("/Sadna/server/api.php",data,function(response){
        if(response.success){
            $(document).ready(function(){
                $("#alergic-report").fadeToggle(2000);  
            });
        }

    })
}

function getAlergicReports(){
    var data = getFormData("#alergic-report form");
    httpGet("/Sadna/server/api.php?route=get_report", data,function(response){
        if(response.success && response.data instanceof Array){
            createTable(response.data);
           }
        });
    }

function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row + '<th>'+item+'</th>';
    })
    return row + '</tr>';
}//



function createTable(data){
    console.log(data)
    var tableElement = document.getElementById("kids-table");
    var table='';

    table = table + buildThs(['first_name','last_name','parent_name','phone_number']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.first_name+'</td><td>' +item.last_name+'</td><td>'+item.parent_name +'</td><td>' + item.phone_number +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}