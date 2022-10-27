const getFormData = () => {
	const form = document.getElementById("login-form");
	return new FormData(form);
}

const toJson = function (event) {
	const formData = getFormData();
	event.preventDefault();
	let object = {};
	formData.forEach((value, key) => {
		if (!Reflect.has(object, key)) {
			object[key] = value;
			return;
		}
		if (!Array.isArray(object[key])) {
			object[key] = [object[key]];
		}
		object[key].push(value);
	});
	let json = JSON.stringify(object);
	$.ajax({
		type: 'POST',
		url: 'http://localhost:8080/src/Model/User/login.php',
		dataType: 'json',
		data: json,
		contentType: 'application/json',
		success: function(data) {
		  alert('Your registration was successfully')
		}
	  });
};

window.onload = function () {
	const submit = document.getElementById("loginbtn");
	submit.addEventListener("click", toJson);
}
