function getFormData(formSelector){
    var form = document.querySelector(formSelector),
        data = {},
        inputs = form.querySelectorAll("input"),
        selectors = form.querySelectorAll("select"),
        textareas = form.querySelectorAll("textarea");

    var getData = function(item){
         var name = item.getAttribute("name");
         data[name] = item.value; 
    }

    if(inputs.length){
        inputs.forEach(getData);
    }

    if(selectors.length){
        selectors.forEach(getData);
    }

    if(textareas.length){
        textareas.forEach(getData);
    }
    return data;
}


function httpGet(url,params,callback){
    $.get(url,params,function(response) {
        if(response){
            try {
                var responseData = JSON.parse(response);
                if(responseData.success){
                    callback(responseData);
                }
            }
            catch(err) {}
        }
    })
}


function httpPost(url,data,callback){
    $.post(url,data,function(response) {
        if(response){
            try {
                var responseData = JSON.parse(response);
                if(responseData.success){
                    callback(responseData);
                }
            }
            catch(err) {}
        }
        
    })
}
