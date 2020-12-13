updateTable();



function updateTable() {
	
	$.ajax({
		type: "GET",
		data:{},
		url: "http://localhost/PostOffice/LeaveManagementController/getLeaveApproveDetails",
		success: function (data){
			displayResults(JSON.parse(data));
		
		}
	});
}

function displayResults(data) {
    const tableBody = document.getElementById("leave_approve_tbody");
  ///  tableBody.innerHTML = '';
    const numberOfRows = data.length;


    

    for (let i = 0; i < numberOfRows; i++) {
        let values = Object.values(data[i]);
        const numberOfColumns = values.length;
        var row = tableBody.insertRow(i);

        for (let j = 0; j < numberOfColumns+1; j++) {
            if (j==numberOfColumns) {
                if (values[6]==1) {
                    var cell=row.insertCell(j);
                    var button =document.createElement("button");
                    button.innerHTML="Delete";
                    button.className="Button";
                    var body=document.getElementsByTagName("body")[i];
                    cell.appendChild(button);

                    button.addEventListener("click",function(){
                        var id=values[0];
                        window.location.replace("http://localhost/PostOffice/LeaveManagementController/deleteLeaveForm/"+id);
                    });
                }    
            }else{
                var cell = row.insertCell(j);
                if (j==6) {
                cell.innerHTML = selectStatusByValue(values[j]);
                var selectElement = document.createElement("select");
                selectElement.innerHTML='<option value="">Update Status</option><option value="2">Approved</option><option value="3">Rejected</option>';
                  selectElement.addEventListener("change", function(){
                    var id=values[0];
                    var value= this.value;
                    var parent = this.parentElement;
                    updateState(id,value, parent, this);
                  });
                  cell.appendChild(selectElement);

               
                }else if (j==2) {
                    if(values[j]==1){
                        cell.innerHTML = "minor staff";
                    }else if(values[j]==2){
                        cell.innerHTML = "employee user";
                    }else{
                        cell.innerHTML = "main user";
                    }
                }else{
                    cell.innerHTML = values[j];
                }

            }
            
        }
    }    
}
function selectStatusByValue(value){
    let text = "";
    if(value == 1){
        text = "Applied";
    }else if(value==2){
        text = "Approved";
    }else{
        text = "Rejected";
    }

    return text;
}

function updateState(id,value, parent, selectElement){


    $.ajax({
        type: "POST",
        data:{
            identity: id,
            val: value
        },
        url: "http://localhost/PostOffice/LeaveManagementController/updateLeaveForm",
        success: function (data){
            parent.innerHTML = selectStatusByValue(value);
            parent.appendChild(selectElement);
        
        }
    });



}


