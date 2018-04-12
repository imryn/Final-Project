


function getReports(){

    var data = getFormData("#reports form");
    data['route'] = 'create_Alergicreport';
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
    httpGet("/Sadna/server/api.php?route=get_Alergicreport", data,function(response){
        if(response.success && response.data instanceof Array){
            createAlergicTable(response.data);
           }
        });
    }

function getExceptionReports(){
    var data = getFormData("#exception-report form");
    httpGet("/Sadna/server/api.php?route=get_Exceptionsreport", data,function(response){
        if(response.success && response.data instanceof Array){
            createExceptionTable(response.data);
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



function createAlergicTable(data){
    console.log(data)
    var tableElement = document.getElementById("kids-table");
    var table='';

    table = table + buildThs(['First Name','Last Name','Parent Name','Phone Number']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.first_name+'</td><td>' +item.last_name+'</td><td>'+item.parent_name +'</td><td>' + item.phone_number +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}

function createExceptionTable(data){
    console.log(data)
    var tableElement = document.getElementById("kids-table");
    var table='';

    table = table + buildThs(['Date','First Name','Last Name','Notes']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.observationDate+'</td><td>' +item.first_name+'</td><td>'+item.last_name +'</td><td>' + item.observation +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}