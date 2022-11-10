// Builds the HTML Table out of carModel
updateCarModel = function (value) {
    let wait = document.getElementById("wait")
    wait.style.display = "block"; // Blende des wait, Platzhalter ein
    let filter = document.getElementById('filter').value;
    let theta = document.getElementById('theta').value;
    var url = 'http://localhost:8080/src/Api/Car/read_filter.php?filter=' + filter + '&theta=' + theta + '&value=' + value;
    getJSON(url);

}

//angabe der URI für GET Request

getJSON = function (url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function () {
        var status = xhr.status;
        if (status === 200) {
            handleResult(xhr.response);
        } else {
            handleResult(xhr.response);
        }
    };
    xhr.send();
}
handleResult = function (data) 
{
    carModel = JSON.parse(data)//Parse die Daten in der JSON in die Variable result
    var resultcount= document.getElementById('resultcount');//result Counter
    if(carModel.length>0){ //error handling für keine Suchtreffer
    resultcount.innerHTML = carModel.length+" cars fit with your filter.";
    }
    else {
        resultcount.innerHTML = "Poorly we found no cars matching your filters.";
    }
    buildHtmlTable('#carDataTable', carModel);//führe buildTable aus, übergib carModel
}
function buildHtmlTable(selector, carModel) {
    wait.style.display = "none";//Entferne den Platzhalter
    var Table = document.getElementById('carDataTable');//definiere Table aus ID
    Table.innerHTML = ""; //Leere den aktuellen Inhalt, sonst fügt es einfach unten an
    var columns = addAllColumnHeaders(carModel, selector);//columns werden in ausgelagerter Funktion erzeugt
    for (var i = 0; i < carModel.length; i++) {
        var row$ = $('<tr/>');
        for (var colIndex = 0; colIndex < (columns.length + 1); colIndex++) {
            if (colIndex == columns.length) {
                //letzte Spalte erreicht, füge Button (<a>-Tag, Rest passiert durch CSS) auf Detail Seite an 
                var cellValue = "<a id='showDetails' href='/index.php?c=car&a=detail&i=" + carModel[i]['id'] + "'>Show Details</a>";
            }
            else {
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
window.onload= function onLoad(){
    updateCarModel("");
 
}