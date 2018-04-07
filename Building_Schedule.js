window.addeventasync = function(){
    addeventatc.settings({
        appleical  : {show:false, text:"Apple Calendar"},
        google     : {show:true, text:"Google <em>(online)</em>"},
        outlook    : {show:false, text:"Outlook"},
        outlookcom : {show:false, text:"Outlook.com <em>(online)</em>"},
        yahoo      : {show:false, text:"Yahoo <em>(online)</em>"}
    });
};      

$("#bfInput, #eaInput, #lInput").blur(function(e){
    var newText = $(this).val();

    $(this).parent().find('.description').text(newText);
})

$("#date").blur(function(){
    var newDate = $("#date").val()

    $("#bf #startb").text(newDate + ' 10:45 AM')
    $("#bf #endb").text(newDate + ' 11:15 AM')

    $("#ea #starte").text(newDate + ' 11:20 AM')
    $("#ea #ende").text(newDate + ' 13:30')

    $("#ln #startl").text(newDate + ' 13:45')
    $("#ln #endl").text(newDate + ' 14:15')
})
