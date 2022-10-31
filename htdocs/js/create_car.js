const getFormData = () => {
	const form = document.getElementById("create-form");//Konstante form, ist Element mit css id create-form
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
		type: 'POST', //Post- Methode ausgewählt
		url: 'http://localhost:8080/src/Model/Car/create.php', //Endpunkt der API, diese erwartet eine JSON
		dataType: 'json', //Datentyp angeben
		data: json, 
		contentType: 'application/json',
		success: function(data) { //Falls die Funktion erfolgreich ausgeführt wurde ohne Fehler etc.
		  alert('Your car was successfully written into the database')
		}
	  });
};

window.onload = function () {
	const submit = document.getElementById("submit");//define submit as the btn with id submit
	submit.addEventListener("click", toJson);//EventListener wartet auf click auf btn und führt toJson aus
}
