import {getTodayDate} from './helpers/timeAndDate.js';


let submit = document.getElementById('mark');
submit.addEventListener("click", function(){
    console.log("LOGGING");
    const today = getTodayDate();
    document.ready(updateSystemLog(today));
});

function log(){
    
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