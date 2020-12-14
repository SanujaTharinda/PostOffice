$(function(){
    var URL = window.location.href;
    if(URL == 'http://localhost/PostOffice/MinorStaffDetailsController/minorStaffDetails'){
        $.ajax({
            type: 'POST',
            data: {
                search: null
            },
            url: "http://localhost/PostOffice/MinorStaffDetailsController/viewDetails",
            success: function (data) {
                displaySearchResults(JSON.parse(data));
            }
        });
    }

    else if(URL == 'http://localhost/PostOffice/MinorStaffDetailsController/addEmployeePage'){
        $.ajax({
            type: 'POST',
            data: {
                search: null
            },
            url: "http://localhost/PostOffice/MinorStaffDetailsController/getUserDetails",
            success: function (data) {
                addUser(JSON.parse(data));
            }
        });

    }

    
    else if(URL != 'http://localhost/PostOffice/MinorStaffDetailsController/minorStaffDetails'){
        $(document).ready(function () {
        var URLSplit = URL.split('/');
            var lastSegment = URLSplit.pop();
            edit(lastSegment);
        });
    }

});

function addUser(data){
    var selectElement = document.getElementById("user");
    docFragment = document.createDocumentFragment();
    const numberOfRows = data.length;
    console.log(numberOfRows);

    if(numberOfRows !=0){
        for (let i = 0; i < numberOfRows; i++) {
            let values = Object.values(data[i])
            var option = document.createElement('option');
            option.value = values[0];
            option.appendChild(document.createTextNode(values[2]));
            docFragment.appendChild(option);
        }
        selectElement.appendChild(docFragment);
    }

}

function instantSearch(searchElement) {
    $.ajax({
        type: 'POST',
        data: {
            search: searchElement
        },
        url: "http://localhost/PostOffice/MinorStaffDetailsController/search",
        success: function (data) {
            displaySearchResults(JSON.parse(data));
        }
    });
}


function displaySearchResults(data) {
    const tableBody = document.getElementById("#minorStaffDetails-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;

    if(numberOfRows !=0){
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
                            window.location.replace("http://localhost/PostOffice/MinorStaffDetailsController/editEmployeeDetails/"+id);
                            
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
                            window.location.replace("http://localhost/PostOffice/MinorStaffDetailsController/deleteEmployeeDetails/"+id);
                        });
                    }else{
                        var cell = row.insertCell(j);
                        cell.innerHTML = values[j];
                    }

            }
            $('#inform').css('visibility','hidden')
        }
    }else{
        $('#inform').css('visibility','visible')
    }
}

function edit(ID){
    $.ajax({
        type: 'POST',
        data: {
            id: ID
        },
        url: "http://localhost/PostOffice/MinorStaffDetailsController/getEditEmployeeDetails",
        success: function (data) {
           //console.log(data);
           editdetails(JSON.parse(data));
            
        }
    });
};

function editdetails(data){
    const formName = document.getElementById("#editEmployeeForm");
    var values = Object.values(data[0]);
    const numberOffields = values.length;

    var x='';
    for (let j = 0; j < numberOffields; j++) {
        let x = (values[j]);
        document.getElementById("edit"+j.toString(10)).value = x;

    }
}