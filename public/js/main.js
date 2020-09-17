//New Message Button
// $(".new-message-anchor").on("click", function () {
//     let displayValue = $("#new-message-box").css("display");
//     if (displayValue == "none") {
//         $("#new-message-box").css("display", "inline");
//     } else {

//         $("#new-message-box").css("display", "none");
//     }



// });


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

    for (let i = 0; i < numberOfRows; i++) {
        let values = Object.values(data[i]);
        const numberOfColumns = values.length;
        var row = tableBody.insertRow(i);

        for (let j = 0; j < numberOfColumns; j++) {
            var cell = row.insertCell(j);
            cell.innerHTML = values[j];
        }
    }
}