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

    KiData['route'] = 'update_kid';
    httpPost("/Sadna/server/api.php",KiData,function(response){
        if(response.success){
            savingChangesinKidbag.error("the kid bag saved successfully");
        }

    })
}