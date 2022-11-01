
//let bc= document.getElementsByClassName('breadcrumb')[0]

//bc.style.display="none"
//console.log(bc)

 
let wait = document.getElementById("wait") // wait= das Element mit der ID wait
var xhr = new XMLHttpRequest()
var url = 'http://localhost:8080/index.php?c=ajax';//angabe der URI für GET Request
xhr.open("GET", url, true);

wait.style.display = "block"; // Blende des wait, Platzhalter ein
xhr.onreadystatechange = function () { 
    if (this.readyState == 4 && this.status == 200) {//Falls xhr eine sinnvolle Antwort bekommt
        handleResult(this.responseText); //Verarbeite Ergebnis

    }
}

handleResult = function (data) { //Diese Funktion wird ausgeführt sobald die Antwort da ist
    wait.style.display = "none";//Entferne den Platzhalter

    let result = JSON.parse(data)//Parse die Daten in der JSON in die Variable result

    let container = document.getElementById('result')//definiere den Container in dem das ERgebnis anzuzeigen ist, (ID = result)
    for (let i = 0; i < result.length; i++) {//für alle i von 0 bis zur länge des Ergebnisses
        
        console.log(result[i]) //Ausgabe in Konsole
        let node = document.createElement('a'); //Erstelle neue node mit a (für einen Link)
        node.href = result[i].url //setze den Link von der node auf die angegebene url
        node.text = result[i].label //setze den Text der node auf den String der im label steckt
        container.appendChild(node) //Pack den Link an den Container
    }
}



xhr.send();