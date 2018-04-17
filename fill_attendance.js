
function saveInServer(){
    var loopLength = $("#attendance-table tr").length 
    var updateKids = []
    for(var i=0; i<loopLength; i++){//insert all the kids that we need to update to one list
        var tr = $('#attendance-table tr:eq(' + i + ')')
        var kidId = tr.find('.kidId').text()
        var parentId = tr.find('.parentId').text() 
        var kindergartenid = tr.find('.kindergartenid').text() 
        var attendance = tr.find('.attendance input').is(':checked')
        
        if(!attendance && kidId){
            updateKids.push({kidId:kidId,parentId:parentId,kindergartenid:kindergartenid})
        }
        // updateKids.
    }


    var sql = 'DELETE FROM noattendance WHERE date=CURRENT_DATE(); '
    for(var i=0; i<updateKids.length; i++){
        sql += ' insert into noattendance (date,parentId,kidId,kindergartenid) values (current_date(),' + updateKids[0].parentId + ',' + updateKids[0].kidId + ',' + updateKids[0].kindergartenid + '); '
    }


    alert("Attendance updated successfully!!");
    location.href = 'updateNoattendance.php?sql=' + sql

}
  