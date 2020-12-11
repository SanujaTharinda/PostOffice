import {getTodayDate} from './helpers/timeAndDate.js';
console.log("Helloooo");

const today = getTodayDate();
console.log(today);
document.ready(updateSystemLog(today));

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