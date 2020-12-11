$(document).ready(function () {
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/DutyArrangementController/viewDutyDetails",
        success: function (data) {
            displayDutyDetails(JSON.parse(data));
        }
    });

});
    
function displayDutyDetails(data) {
        const tableBody = document.getElementById("duty_details_body");
        tableBody.innerHTML = '';
        const numberOfRows = data.length;
    
        for (let i = 0; i < numberOfRows; i++) {
            let values = Object.values(data[i]);
            const numberOfColumns = values.length;
            var row = tableBody.insertRow(i);
    
            for (let j = 0; j < numberOfColumns+2; j++) {
                    if(j == numberOfColumns){
                        var cell = row.insertCell(j);
                        var button = document.createElement("button");
                        button.innerHTML = "Edit";
                        button.className = "Button";
                        var body = document.getElementsByTagName("body")[i];
                        cell.appendChild(button);
                    
                        button.addEventListener("click",function(){
                            var id = values[0];
                            window.location.replace("http://localhost/PostOffice/DutyArrangementController/editDutyPage/"+id);
                           
                            
                        });
                    }else if(j == numberOfColumns+1){
                        var cell = row.insertCell(j);
                        var button = document.createElement("button");
                        button.innerHTML = "Delete";
                        button.className = "Button";
                        var body = document.getElementsByTagName("body")[i];
                        cell.appendChild(button);
                    
                        button.addEventListener("click",function(){
                            var id = values[0];
                            window.location.replace("http://localhost/PostOffice/DutyArrangementController/delete/"+id);
                           
                            
                        });
                    }else{
                        var cell = row.insertCell(j);
                        cell.innerHTML = values[j];
                    }
            }
            
        }
    }