$(document).ready(function () {
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/AttendanceController/lateComesDetails",
        success: function (data) {
            console.log(data);
            displaySearchResults(JSON.parse(data));
        }
    });

});


function displaySearchResults(data) {
    const tableBody = document.getElementById("lateComes-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;

    for (let i = 0; i < numberOfRows; i++) {
        let values = Object.values(data[i]);
        const numberOfColumns = values.length;
        var row = tableBody.insertRow(i);

        for (let j = 0; j < numberOfColumns; j++) {
            console.log(j);
                var cell = row.insertCell(j);
                if(j == 3){
                    if(values[j] == "Not Marked"){
                        var selectElement = document.createElement("select");
                        var name = "status"+values[0];
                        console.log(name);
                        selectElement.setAttribute("name",name);
                        selectElement.innerHTML='<option value="Not Marked">Update Status</option><option value="present">Present</option><option value="absent">Absent</option>';
                        cell.appendChild(selectElement);
                    }
                    else if(values[j] == "present" || values[j] == 'absent'){
                        cell.innerHTML = values[j];
                    }
                }
                else if(j == 5){
                    var selectElement = document.createElement("input");
                   selectElement.setAttribute("maxlength",100);
                    var name = "special_note"+values[0];
                    selectElement.setAttribute("name",name);
                    selectElement.value = values[j];
                    cell.appendChild(selectElement);
                }
                else{
                    cell.innerHTML = values[j];
                }

        }
    }
}
