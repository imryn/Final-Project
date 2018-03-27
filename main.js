
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

    table = table + buildThs(['id','name','last name','mother name','father name','allergies']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.id+'</td><td>' +item.name+'</td><td>'+item.last_name +'</td><td>' + item.mother_name +'</td><td>' + item.father_name +'</td><td>' + item.allergies + '</td></tr>';
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



function createKidForm(callback){
    var data = getFormData("#registration-kid");
    console.log(data);
    var date = new Date(data.bDate).getTime();
    if(!isNaN(date)){
        data.bDate = date;
    }
    data['route'] = 'create_kid';
    httpPost("/Sadna/server/api.php",data,callback);
}

function error(msg){
    document.querySelector(".success-message").textContent = msg;
}

function createParentUser(){
    var data = getFormData("#registration-parent");

    createKidForm(function(response){

        if(response.success){
            data['route'] = 'create_user';
            httpPost("/Sadna/server/api.php",data,function(response){
                if(response.success){
                    window.location.assign("/Sadna/index.html");
                }
                else{
                    error("one of the field is wrong or already used");
                }
            })
        }
        else{
            error("one of the field is wrong or already used");
        }

    });
}