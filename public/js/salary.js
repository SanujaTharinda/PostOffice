$(function () {
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/SalaryController/getSalary",
        success: function (data) {
            displaySearchResults(JSON.parse(data));
        }
    });

});


$( document ).ready(function() {
    $('#DialogDemo').MonthPicker({ MaxMonth: -1,Button: false, OnAfterChooseMonth: function(){ 
        } });
});


function searchMonth(){
    month = document.getElementById("DialogDemo").value;
    searchDetails(month)
}

function displaySearchResults(data) {
    const tableBody = document.getElementById("#attendanceDetails-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;

    if(numberOfRows !=0){
        for (let i = 0; i < numberOfRows; i++) {
            let values = Object.values(data[i]);
            const numberOfColumns = values.length;
            var row = tableBody.insertRow(i);
            if(numberOfColumns ==11){
                for (let j = 0; j < 5; j++){
                    if(j == 2 || j==3 || j==4){
                        var cell = row.insertCell(j);
                        cell.innerHTML = '-';
                    }else{
                        var cell = row.insertCell(j);
                        cell.innerHTML = values[j];
                    }
        
                }
            }
            else{
                for (let j = 0; j < numberOfColumns-1; j++) {           
                    var cell = row.insertCell(j);
                    cell.innerHTML = values[j];
            
                }
            }
        }
        $('#inform').css('visibility','hidden')
    }
    else{
        $('#inform').css('visibility','visible')
    }
}

function searchDetails(Searchmonth){
    console.log(Searchmonth);
    $.ajax({
        type: 'POST',
        data: {
            search: Searchmonth
        },
        url: "http://localhost/PostOffice/SalaryController/searchSalary",
        success: function (data) {
            displaySearchResults(JSON.parse(data));
        }
    });
}


