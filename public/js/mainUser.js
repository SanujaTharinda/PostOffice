$(function(){
    var URL = window.location.href;
    if(URL == 'http://localhost/PostOffice/MainUserDetailsController/mainUserDetails'){
        $.ajax({
            type: 'POST',
            data: {
                search: null
            },
            url: "http://localhost/PostOffice/MainUserDetailsController/viewDetails",
            success: function (data) {
                displaySearchResults(JSON.parse(data));
            }
        });

    }
    
    else{
        $(document).ready(function () {
            var URLSplit = URL.split('/');
                var lastSegment = URLSplit[URLSplit.length-2];
                if(lastSegment == 'minorStaffDetails'){
                    var lastSegment = URLSplit.pop();
                    $.ajax({
                        type: 'POST',
                        data: {
                            id: lastSegment
                        },
                        url: "http://localhost/PostOffice/MainUserDetailsController/showMinorStaffDetails",
                        success: function (data) {
                            console.log(data);
                            show(JSON.parse(data));  
                        }
                    });
                }
                else if(lastSegment == 'editMainUserDetails'){
                    var lastSegment = URLSplit.pop();
                    edit(lastSegment);
                }

        });
    }


});

function edit(ID){
    $.ajax({
        type: 'POST',
        data: {
            id: ID
        },
        url: "http://localhost/PostOffice/MainUserDetailsController/getEditMainUserDetails",
        success: function (data) {
          // console.log(data);
           editdetails(JSON.parse(data));
            
        }
    });
};

function editdetails(data){
    const formName = document.getElementById("#editMainUserForm");
    var values = Object.values(data[0]);
    const numberOffields = values.length;

    var x='';
    for (let j = 0; j < numberOffields; j++) {
        if(j!=3){
            let x = (values[j]);
            document.getElementById("edit"+j.toString(10)).value = x;
        }
    }
}

function show(data){
    const tableBody = document.getElementById("#minorStaffDetails-table-body");
    tableBody.innerHTML = '';
    const numberOfRows = data.length;
    console.log(numberOfRows);

    if(numberOfRows !=0){
        for (let i = 0; i < numberOfRows; i++) {
            console.log(i);
            let values = Object.values(data[i]);
            const numberOfColumns = values.length;
            var row = tableBody.insertRow(i);

            for (let j = 0; j < numberOfColumns-1; j++) {
                var cell = row.insertCell(j);
                cell.innerHTML = values[j];
            }

            $('#inform').css('visibility','hidden')
        }
    }else{
        $('#inform').css('visibility','visible')
    }
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
                    if(j == numberOfColumns -1){
                        var cell = row.insertCell(j);
                        var button = document.createElement("button");
                        button.innerHTML = "Details";
                        button.className = "Button";
                        var body = document.getElementsByTagName("body")[i];
                        cell.appendChild(button);
                    
                        button.addEventListener("click",function(){
                            var id = values[0];
                            window.location.replace("http://localhost/PostOffice/MainUserDetailsController/minorStaffDetails/"+id);
                            
                        });
                    }
                    else if(j == numberOfColumns){
                        var cell = row.insertCell(j);
                        var button = document.createElement("button");
                        button.innerHTML = "Edit";
                        button.className = "Button";
                        var body = document.getElementsByTagName("body")[i];
                        cell.appendChild(button);
                    
                        button.addEventListener("click",function(){
                            var id = values[0];
                            window.location.replace("http://localhost/PostOffice/MainUserDetailsController/editMainUserDetails/"+id);
                            
                        });
                    }else if(j == numberOfColumns+1){
                        var cell = row.insertCell(j);
                        var button = document.createElement("button");
                        button.innerHTML = "Delete";
                        button.className = "Button";
                        var body = document.getElementsByTagName("body")[i];
                        cell.appendChild(button);
                    
                        button.addEventListener("click",function(){
                            var Email = values[1];
                            window.location.replace("http://localhost/PostOffice/MainUserDetailsController/deleteMainUserDetails/"+Email);
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