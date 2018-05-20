
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
        sql += ' insert into noattendance (date,parentId,kidId,kindergartenid) values (current_date(),' + updateKids[i].parentId + ',' + updateKids[i].kidId + ',' + updateKids[i].kindergartenid + '); '
    }


    alert("Attendance was updated successfully!!");
    location.href = 'updateNoattendance.php?sql=' + sql

}
  
function sendEmail(id)
{
    window.location=('http://localhost/Sadna/fill_attendance_email.php?id=' +id)
}