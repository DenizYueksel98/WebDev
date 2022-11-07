function updateRequest() {
	$filter =jQuery(document.getElementById('filter')).val();
	$theta =jQuery(document.getElementById('theta')).val();
	$value =jQuery(document.getElementById('value')).val();
	
	$.ajax({
		url: 'http://localhost:8080/src/Api/Car/read_filter.php',
		type: "POST",
		cache: false,
		data: "filter=" + filter + "&theta=" + theta + "&value=" + value,
		async: false,
		success: function (data) {
			alert(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		}
	});

}
window.onload = function () {
	const formCreate = document.getElementById("filter-form");
	formCreate.addEventListener("submit", updateRequest);
}