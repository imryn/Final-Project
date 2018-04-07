function DetailskidUpdate(){
    var data = getFormData("#kid-observation");
    var kidData = getFormData("#kid-detailsUpdate");
    data["kidId"] = kidData['kidId'];
    data["fname"] = kidData['fname'];
    var date = new Date(data.observationDate).getTime();
    if(!isNaN(date)){
        data.observationDate = date;
    }
    data['route'] = 'observation_error';
    httpPost("/Sadna/server/api.php",data,function(response){
        if(response.success){
            errorForUser("the observation saved successfully")
        }
    })

}

DetailskidUpdate.error= function(msg){
    document.querySelector(".success-message2").textContent = msg;
}

function errorForUser(msg){
    document.querySelector(".success-message").textContent = msg;
}

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

    data['route'] = 'update_kid';
    httpPost("/Sadna/server/api.php",data,function(response){
        if(response.success){
            errorForUser("the kid bag saved successfully");
        }

    })
}