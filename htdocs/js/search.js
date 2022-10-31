
function showHint(str) {
    if (str.length == 0) { //falls nichts eingegeben wurde
      document.getElementById("txtHint").innerHTML = ""; //setze den innerHTML-WErt von unserem Element mit der ID txtHint auf "" (leer)
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();//Neuer Request
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {//Falls erfolgreich
          document.getElementById("txtHint").innerHTML = this.responseText;//Setze den innerHTML-Wert auf den der Antwort (Ergebnis ist ein String und wird geechoed)
        }
      };
      var url = 'http://localhost:8080/index.php?c=search&a=suggest&query=';//Angabe der URI, die auf Anfrage antwortet
      xmlhttp.open("GET", url + str, true);//GET-Request
      xmlhttp.send();
    }
  }
