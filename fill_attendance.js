/*  

karin you need to change the name of classes in the getelementByid and fetFromData and also httpGet is not good.
it is working  with a specific functions in kids.php' you cant just put here the functions and hope it will work.
also in function foreach you put 3 inputs but in table you put 4 (you forgot attendance)

*/
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

    table = table + buildThs(['ID','First Name','Last Name','Attendance ?','Send SMS now']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.id+'</td><td>' +item.fname+'</td><td>'+item.last_name +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}



function getReports(){

    var data = getFormData("#reports form");

    // data.statTime =  functionToTimestamp(data.statTime);

    httpGet("/Sadna/server/api.php?route=create_report",data, function(response) {
        if(response.data instanceof Array){
            createTable(response.data);
        }

    })

}










