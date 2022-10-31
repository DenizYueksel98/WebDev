const getFormData = () => {
	const form = document.getElementById("regform");//Konstante form, ist Element mit css id regform
	return new FormData(form);//returned die Daten der eben definierten Form
}

const toJson = function (event) {
	const formData = getFormData();//Methodenaufruf von getFormData
	event.preventDefault();//Verhindert die Weiterleitung an die action="irgendeine URI", die normalerweise passieren würde
	let object = {}; //neues objekt
	//forEach Schleife um Werte auszulesen/ Differenzierung wegen Input Feldern und Radio Buttons
	formData.forEach((value, key) => { //für alle
		if (!Reflect.has(object, key)) { //wie ein in Operator, also falls es den key noch nicht im objekt gibt
			object[key] = value; //setze im objekt/array mit dem schlüssel key, den gewünschten value
			return;
		}
		if (!Array.isArray(object[key])) {//falls es den schlüssel noch nicht im Array gibt
			object[key] = [object[key]]; 
		}
		object[key].push(value); //pack den value in das Objekt unter Verwendung des Schlüssels
	});
	let json = JSON.stringify(object);//Stringify macht eine hübsche JSON aus einem Objekt
	$.ajax({
		type: 'POST', //Post-Methode wurde gewählt, denn Daten werden hingesendet
		url: 'http://localhost:8080/src/Model/User/create.php', //Endpunkt der Api, diese erwartet eine JSON
		dataType: 'json', // Datentyp angeben
		data: json,
		contentType: 'application/json',
		success: function(data) {//Falls erfolgreich ohne Fehler ausgeführt
		  alert('Your registration was successfully')
		}
	  });
};
function func1() {//RegisterRun
	var btn =document.getElementById("regbtn")
    btn.addEventListener("mouseover", run);//Neuer Eventlistener, falls Cursor drüber ist, wir run() ausgeführt
    function run() {
        if (!$pwcorrect) {//Falls pw nicht korrekt
            if (!btn.style.left) { //Falls btn.style.left noch nicht vom script gesetzt wurde
                btn.style.left = "300px"; //Setze Linken Abstand auf 300px
            } else {
                var posLeft = parseInt(btn.style.left); // Ziehe aktuellen Abstand von Linksd
                if (posLeft <= 300) { //Falls der Abstand 300
                    btn.style.left = (posLeft + 500) + "px"; // Springe 500px nach rechts
                } else if (posLeft > 900) { //Falls der Abstand nun über 900 ist
                    btn.style.left = (posLeft - 500) + "px"; // Springe 500 px nach links
                }
                else {
                    btn.style.left = "300px";//Setze linken Abstand hart auf 300px
                }
            }
        }
        else {
            btn.style.left = "550px";//Falls pw correct -> Btn statisch in die Mitte
        }
    }
}
function func2() {
    //Eventlistener falls das PasswordFeld aktualisiert wurde, wird CheckPassword() ausgeführt
    document.getElementsByName("password")[0].addEventListener('change', CheckPassword);
    
    function CheckPassword() {
        var passw = /^[A-Za-z]\w{7,14}$/;//definiere erlaubte PW Specs. (zws. 7-20 Zeichen und nur Buchstaben)
        if (this.value.match(passw)) {//Falls es zutrifft
            $("regform").submit();//Sende Form ab
            $pwcorrect = true;//Setze pw auf correct
            document.getElementById("regbtn").removeEventListener("mouseover", run);//entferne EventListener für hover			
        }
        else { //PW entspricht noch nicht den Anforderungen
            alert('PW muss zwischen 7-20 Zeichen lang sein, muss mit einem Buchstaben beginnen und darf keine Sonderzeichen enthalten');
            $pwcorrect = false;//variable bleibt falsch
            return false;
        }
    }
}
//Beim Ladend es Fensters
window.onload = function () {
	var btn = document.getElementById("regbtn"); //Button der Variable btn zuweisen
	func1(); //Führe func1 aus, sorgt für Links und Rechts Springen des Buttons (Run [awayFromMouse])
	func2(); //Führe func2 aus
	btn.addEventListener("click", toJson);
}
