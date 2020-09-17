today = getTodayDate();
updateSystemLog(today);


function getTodayDate() {
    var date = new Date();
    let year = date.getFullYear();
    let month = (date.getMonth() + 1).toString();
    let day = date.getDate().toString();

    if (day.length == 1) {
        day = "0" + day;
    }
    if (month.length == 1) {
        month = "0" + month;
    }
    return year + "." + month + "." + day;
}

function updateSystemLog(today) {
    $.ajax({
        type: 'POST',
        data: {
            date: today
        },
        url: "http://localhost/PostOffice/SystemController/updateLog",

        success: function (data) {
            console.log(data);
        }
    });
}