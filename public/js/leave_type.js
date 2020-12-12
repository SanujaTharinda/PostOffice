updateTable();


function updateTable() {
	/*console.log("Updating table");*/
	$.ajax({
		type: "GET",
		data:{},
		url: "http://localhost/PostOffice/LeaveManagementController/getLeaveTypeDetails",
		success: function (data){
			displayResults(JSON.parse(data));
		
		}
	});
}

function displayResults(data) {
    const tableBody = document.getElementById("leave_type_tbody");
    /*tableBody.innerHTML = '';*/
    const numberOfRows = data.length;

    for (let i = 0; i < numberOfRows; i++) {
        let values = Object.values(data[i]);
        const numberOfColumns = values.length;
        var row = tableBody.insertRow(i);

        for (let j = 0; j < numberOfColumns+2; j++) {
            if (j==numberOfColumns) {
                var cell=row.insertCell(j);
                var button =document.createElement("button");
                button.innerHTML="Edit";
                button.className="Button";
                var body=document.getElementsByTagName("body")[i];
                cell.appendChild(button);

                button.addEventListener("click",function(){
                    var id=values[0];
                    window.location.replace("http://localhost/PostOffice/LeaveManagementController/editLeavePage/"+id);
                })

            }else if(j==numberOfColumns+1){
                var cell=row.insertCell(j);
                var button =document.createElement("button");
                button.innerHTML="Delete";
                button.className="Button";
                var body=document.getElementsByTagName("body")[i];
                cell.appendChild(button);

                button.addEventListener("click",function(){
                    var id=values[0];
                    window.location.replace("http://localhost/PostOffice/LeaveManagementController/deleteLeave/"+id);
                })

            }else{
                var cell = row.insertCell(j);
                cell.innerHTML = values[j];
            }
            
        }
    }
}