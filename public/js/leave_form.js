getLeaveTypes();

function getLeaveTypes() {
    $.ajax({
		type: "GET",
		data:{},
		url: "http://localhost/PostOffice/LeaveManagementController/getLeaveTypeDetails",
		success: function (data){
			displayLeaveTypes(JSON.parse(data));
		
		}
	});
    
}

function displayLeaveTypes(data){
    let select=document.getElementById('leave_type');
    for (element of data ){
        let option=document.createElement("option");
        option.setAttribute("value",element["leave_type"]);
        option.innerHTML=element['leave_type'];
        select.appendChild(option);
    }
}