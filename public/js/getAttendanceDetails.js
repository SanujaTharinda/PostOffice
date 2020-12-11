$(function () {
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/AttendanceController/getAttendance",
        success: function (data) {
            displaySearchResults(JSON.parse(data));
        }
    });

});

function displaySearchResults(data) {
    const tableBody = document.getElementById("#attendanceDetails-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;

    if(numberOfRows !=0){
        for (let i = 0; i < numberOfRows; i++) {
            let values = Object.values(data[i]);
            const numberOfColumns = values.length;
       //     console.log(numberOfColumns);
            var row = tableBody.insertRow(i);
            if(numberOfColumns === 11){
                for (let j = 0; j < 4; j++){
                    if(j == 2){
                        var cell = row.insertCell(j);
                        cell.innerHTML = '-';
                    }else if(j == 3){
                        var cell = row.insertCell(j);
                        cell.innerHTML = '-';
                    }else{
                        var cell = row.insertCell(j);
                        cell.innerHTML = values[j];
                    }
        
                }
            }
            else{
                if(numberOfColumns === 5){
                    for (let k = 1; k < numberOfColumns; k++) {    
                        var cell = row.insertCell(k-1);
                        cell.innerHTML = values[k];
                
                    }
                }
            }
        }
        $('#inform').css('visibility','hidden')
    }
    else{
        $('#inform').css('visibility','visible')
    }
}

function searchDetails(Searchdate){
    $.ajax({
        type: 'POST',
        data: {
            search: Searchdate
        },
        url: "http://localhost/PostOffice/AttendanceController/searchAttendance",
        success: function (data) {
           // console.log(data);
            displaySearchResults(JSON.parse(data));
        }
    });
}


