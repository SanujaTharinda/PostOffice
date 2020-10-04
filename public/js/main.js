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