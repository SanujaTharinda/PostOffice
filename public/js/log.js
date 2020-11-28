import { getTodayDate } from './helpers/timeAndDate.js';
import { request } from './services/httpService.js';

const today = getTodayDate();
updateSystemLog(today);

function updateSystemLog(today) {
    request({
        type: 'POST',
        data: {
            date: today
        },
        url: "http://localhost/PostOffice/SystemController/updateLog",
        success: { }
    });
}