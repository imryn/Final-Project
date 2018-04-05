

 document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelectorAll("templateHtml").forEach(function(item){
        var src= item.getAttribute("src");
        $.get(src,function(template) {
            item.innerHTML = template;
        })
    })
  });


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
        inputs.forEach(function(input){
            
            var name = input.getAttribute("name");

            switch (input.getAttribute("type")) {
                case "checkbox":
                case "radio":
                    data[name] = input.checked;
                    break;
                default:
                    data[name] = input.value;
                    break;
            }
        });
    }

    if(selectors.length){
        selectors.forEach(getData);
    }

    if(textareas.length){
        textareas.forEach(getData);
    }
    return data;
}


function setFormData(formId,data){
    for(var key in data){
        var item = document.querySelector(formId + " [name= " + key + "]");
        if(item){
            var type = item.getAttribute("type");
            switch (type) {
                case "radio":
                case "checkbox":
                    if(data[key] == "1"){
                        item.setAttribute("checked", true);
                    }
                    break;
                default:
                    item.setAttribute("value",data[key]);
                    break;
            }
        }
    }
}

function timestampToDate(timestamp){
    var date = new Date(Number(timestamp));
    var month = date.getMonth() + 1;
    month =  month < 10 ? "0" + month  : month;
    var day =  date.getDate() < 10 ? ("0" + date.getDate() ) : date.getDate();
    return date.getFullYear() + "-" + month + "-" + day;
}

function httpGet(url,params,callback){
    $.get(url,params,function(response) {
        if(response){
            try {
                var responseData = JSON.parse(response);
                callback(responseData);
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
                callback(responseData);
            }
            catch(err) {}
        }
        
    })
}
