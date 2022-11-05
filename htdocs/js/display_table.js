// Builds the HTML Table out of carModel.
function buildHtmlTable(selector) {
    var columns = addAllColumnHeaders(carModel, selector);
    for (var i = 0; i < carModel.length; i++) {
        var row$ = $('<tr/>');
        for (var colIndex = 0; colIndex < (columns.length+1); colIndex++) {
            if(colIndex==columns.length){
                var cellValue= "<a href='/index.php?c=car&a=detail&i="+carModel[i]['id']+"'>Show Details</a>";
            }
            else{
                var cellValue = carModel[i][columns[colIndex]];
            }
            if (cellValue == null) cellValue = "";
            
            row$.append($('<td/>').html(cellValue));
        }
        $(selector).append(row$);
    }
}

// Adds a header row to the table and returns the set of columns.
// Need to do union of keys from all records as some records may not contain
// all records.
function addAllColumnHeaders(carModel, selector) {
    var columnSet = [];
    var headerTr$ = $('<tr/>');
    for (var i = 0; i < carModel.length; i++) {
        var rowHash = carModel[i];
        for (var key in rowHash) {
            if ($.inArray(key, columnSet) == -1) {
                columnSet.push((key));
                headerTr$.append($('<th/>').html(key));
            }
        }
    }
    $(selector).append(headerTr$);
    return columnSet;
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}