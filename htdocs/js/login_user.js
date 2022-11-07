//get Data from Form
const getFormData = () => {
	const form = document.getElementById("login-form");
	return new FormData(form);
}

const toJson = function (event) {
	const formData = getFormData(); //get Data from Form
	event.preventDefault();//Verhindere action Event
	let object = {}; //neues Objekt für die Speicherung von Benutzereingaben
	formData.forEach((value, key) => {
		if (!Reflect.has(object, key)) {
			object[key] = value;
			return;
		}
		if (!Array.isArray(object[key])) {
			object[key] = [object[key]];
		}
		object[key].push(value); //Packe den WErt in das Objekt
	});
	let json = JSON.stringify(object);//erzeuge aus dem Objekt eine JSON
	$.ajax({
		type: 'POST', //Post-Methode ausgewählt
		url: 'http://localhost:8080/src/Api/User/login.php',//Endpunkt der API (erwartet JSON)
		dataType: 'json', //Angabe des Datentyps
		data: json,
		contentType: 'application/json',
		success: function(data) {//Falls erfolgreich-> schicke Alert mit s.u.
		  alert('Your registration was successfully')
		}
	  });
};

//Beim Laden des Fensters 
window.onload = function () {
	const submit = document.getElementById("loginbtn"); //submit-> Das Element mit der ID: loginbtn
	submit.addEventListener("click", toJson);//Falls submit geklickt wurde, führe MEthode toJson aus
}
