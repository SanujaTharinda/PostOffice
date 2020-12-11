
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        data: {
            search: null
        },
        url: "http://localhost/PostOffice/OtManagementController/viewOtDetails",
        success: function (data) {
            displayOtDetails(JSON.parse(data));
        }
    });

});
    
function displayOtDetails(data) {
        const tableBody = document.getElementById("ot_details_body");
        tableBody.innerHTML = '';
        const numberOfRows = data.length;
    
        for (let i = 0; i < numberOfRows; i++) {
            let values = Object.values(data[i]);
            const numberOfColumns = values.length;
            var row = tableBody.insertRow(i);
    
            for (let j = 0; j < numberOfColumns+2; j++) {
                    if(j == numberOfColumns){
                        var cell = row.insertCell(j);
                           
                    }else if(j == numberOfColumns+1){
                        var cell = row.insertCell(j);
                       
                    }else{
                        var cell = row.insertCell(j);
                        cell.innerHTML = values[j];
                    }
            }
            
        }
}