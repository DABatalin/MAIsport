document.querySelector("form").addEventListener("submit", async function(event) {
	event.preventDefault();

	formData = new FormData(this);

	let response = await fetch('inc/auth.php', {
		method: 'POST',
		body: formData
	});

	let result = await response.text();
	console.log(result);

	if (result == "") {
		// alert("Успешно!");
		window.location.href = "/";
	} else if (result == "1")
		alert("Такого пользователя не существует!");
	else if (result == "2")
		alert("Неверный пароль!");
});