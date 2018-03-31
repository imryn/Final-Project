
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



function createKidForm(data,callback){
    var date = new Date(data.bDate).getTime();
    if(!isNaN(date)){
        data.bDate = date;
    }

    if(idcheck(data['kidId'],createKidForm)){
        data['route'] = 'create_kid';
        httpPost("/Sadna/server/api.php",data,callback);
    }
}
createKidForm.error= function(msg){
    document.querySelector(".success-message2").textContent = msg;
}


function idcheck(idcheck,errorFunction){
    if(idcheck.toString().length > 9){
        errorFunction.error("ID field must contain 9 digits");
        return false;
    }
    return true;
}

function errorForUser(msg){
    document.querySelector(".success-message").textContent = msg;
}

function createParentUser(){
    var parentData = getFormData("#registration-parent");
    var kidData = getFormData("#registration-kid");
    var checkKid = idcheck(kidData['kidId'],createKidForm);
    var checkParent = idcheck(parentData['parentId'],createParentUser);
    if(!checkKid || !checkParent){
        return;
    }
    createKidForm(kidData,function(response){
        if(response.success){
            parentData['route'] = 'create_user';
            httpPost("/Sadna/server/api.php",parentData,function(_response){
                if(_response.success){
                    bootpopup.alert("The form saved successfully","Success",function(){
                        window.location.assign("/Sadna/index.html");
                    });
                }
                else{
                    errorForUser("One of the field is wrong or already used");
                }
            })
        }
        else{
            errorForUser("One of the field is wrong or already used");
        }
    });
}
createParentUser.error = function(msg){
    document.querySelector(".success-message").textContent = msg;
}