/*
$(document).ready(function() {
    $('#create-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './src/Model/Userauthenticate.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'bu.index.php?c=user&a=loggedin';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});*/


async function postFormDataAsJson({ url, formData }) {
	const plainFormData = Object.fromEntries(formData.entries());
	const formDataJsonString = JSON.stringify(plainFormData);

	const fetchOptions = {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			"Accept": "application/json",
		},
		body: formDataJsonString,
	};

	const response = await fetch(url, fetchOptions);

	if (!response.ok) {
		const errorMessage = await response.text();
		throw new Error(errorMessage);
	}

	return response.json();
}

async function handleFormSubmit(event) {
	event.preventDefault();

	const form = event.currentTarget;
	const url = form.action;

	try {
		const formData = new FormData(form);
		const responseData = await postFormDataAsJson({ url, formData });

		console.log({ responseData });
	} catch (error) {
		console.error(error);
	}
}
window.onload=function(){
const formCreate = document.getElementById("create-form");
formCreate.addEventListener("submit", handleFormSubmit);    
}