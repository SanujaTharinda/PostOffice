$(document).ready(function () {
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/AttendanceController/markAttendanceDetails",
        success: function (data) {
            displaySearchResults(JSON.parse(data));
        }
    });

});


function displaySearchResults(data) {
    const tableBody = document.getElementById("attendanceDetails-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;

    for (let i = 0; i < numberOfRows; i++) {
        let values = Object.values(data[i]);
        const numberOfColumns = values.length;
        var row = tableBody.insertRow(i);

        for (let j = 0; j < numberOfColumns+2; j++) {
                if(j == 2){
                    var cell = row.insertCell(j);
                    var x = document.createElement("INPUT");
                    var name = "status"+values[0];
                    x.setAttribute("type","radio");
                    x.setAttribute("name",name);
                    x.setAttribute("value","present");
                    var body = document.getElementsByTagName("body")[i];
                    cell.appendChild(x);
                
                }else if(j==3){
                    var cell = row.insertCell(j);
                    var x = document.createElement("INPUT");
                    var name = "status"+values[0];
                //    console.log(name);
                    x.setAttribute("type","radio");
                    x.setAttribute("name",name);
                    x.setAttribute("value","absent");
                    var body = document.getElementsByTagName("body")[i];
                    cell.appendChild(x);
                }else{
                    var cell = row.insertCell(j);
                    cell.innerHTML = values[j];
                }

        }
    }
}
