

let wait = document.getElementById("wait");
function showHint(str) {
  if (str.length == 0) { //falls nichts eingegeben wurde
    document.getElementById("txtHint").innerHTML = ""; //setze den innerHTML-WErt von unserem Element mit der ID txtHint auf "" (leer)
    return;
  } else {
    wait.style.display = "block";
    var xmlhttp = new XMLHttpRequest();//Neuer Request
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {//Falls erfolgreich
        handleHintResult(this.responseText);
        //document.getElementById("txtHint").innerHTML = this.responseText;//Setze den innerHTML-Wert auf den der Antwort (Ergebnis ist ein String und wird geechoed)
      }
    };
    var url = 'http://localhost:8080/index.php?c=search&a=suggest&q=';//Angabe der URI, die auf Anfrage antwortet
    xmlhttp.open("POST", url + str, true);//GET-Request
    xmlhttp.send();
  }
}

handleHintResult = function (data) {
  wait.style.display = "none";//Entferne den Platzhalter
  let result = JSON.parse(data)//Parse die Daten in der JSON in die Variable result

  let container = document.getElementById('txtHint')//definiere den Container in dem das ERgebnis anzuzeigen ist, (ID = result)
  container.innerHTML = "";
  for (let i = 0; i < result.length; i++) {//für alle i von 0 bis zur länge des Ergebnisses
    console.log(result[i]) //Ausgabe in Konsole
    let node = document.createElement('a'); //Erstelle neue node mit a (für einen Link)
    node.href = result[i].url //setze den Link von der node auf die angegebene url
    node.text = result[i].label //setze den Text der node auf den String der im label steckt
    container.appendChild(node) //Pack den Link an den Container
  }
}

