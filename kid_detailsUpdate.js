function DetailskidUpdate(){
    var data = getFormData("#kid-observation");
    var kidData = getFormData("#kid-detailsUpdate");
    data["kidId"] = kidData['kidId'];
    data["fname"] = kidData['fname'];
    data["lastname"] = kidData['lastname'];
    var date = new Date(data.observationDate).getTime();
    if(!isNaN(date)){
        data.observationDate = date;
    }
    data['route'] = 'observation_error';
    httpPost("/Sadna/server/api.php",data,function(response){
        if(response.success){
            DetailskidUpdate.error("the observation saved successfully")
        }
    })

}

DetailskidUpdate.error= function(msg){
    document.querySelector(".success-message").textContent = msg;
}

savingChangesinKidbag.error=function(msg){
    document.querySelector(".success-message2").textContent = msg;
}

savingChangesinListKidbag.error= function(msg){
    document.querySelector(".success-message").textContent = msg;
}

// function namecheck(namecheck,errorFunction){
//     var check = namecheck.check();
//     if(isNumeric(check)){
//         errorFunction.error("name field can't contains numbers");
//         return false;
//     }
//     return true;
// }

// function isNumeric(n) {
//     return !isNaN(parseFloat(n)) && isFinite(n);
//   }



$(document).ready(function(){
    $("#new-observation").click(function(){
        $("#kid-observation").fadeToggle(2000);
        
    });
});


function savingChangesinKidbag(){
    var KiData = getFormData("#kid-detailsUpdate");
    var date = new Date(KiData.bDate).getTime();
    if(!isNaN(date)){
        KiData.bDate = date;
    }

    // var checkKidname = namecheck(kidData['fname'],savingChangesinKidbag);
    // if(!checkKidname){
    //     return;
    // }

    KiData['route'] = 'update_kid';
    httpPost("/Sadna/server/api.php",KiData,function(response){
        if(response.success){
            savingChangesinKidbag.error("the kid bag saved successfully");
        }

    })
}

function showKindergartenkid(){
    httpGet("/Sadna/server/api.php?route=getKindergartenkid",{}, function(response){
        if(response.success){
            kinderGarten = response.data;
            var flatData = response.data.map(function(item){
                return item.fname + " " + item.lastname;
            })

            putInfoInsideSelector("#kid-choosen #kidname" ,flatData);
        }
    });
}

function showInfoAboutakidList(){
    var data = getFormData("#kid-choosen form");

    var selectedKid = kinderGarten[data.kidOptions];
    data.kidFname = selectedKid.fname;
    data.kidLname = selectedKid.lastname;
        
    httpGet("/Sadna/server/api.php?route=getKidListInfo",{}, function(response){
        if(response.success){
            console.log(response.data);
            response.data.bDate = timestampToDate(response.data.bDate);

            setFormData("#kidList-detailsUpdate form",response.data);
        }
    });
}


var kinderGarten;

function savingChangesinListKidbag(){
    var KiData = getFormData("#kidList-detailsUpdate");

    var date = new Date(KiData.bDate).getTime();
    if(!isNaN(date)){
        KiData.bDate = date;
    }

    KiData['route'] = 'update_kid';
    httpPost("/Sadna/server/api.php",KiData,function(response){
        if(response.success){
            savingChangesinKidbag.error("the kid bag saved successfully");
        }

    })
}