document.querySelector("form").addEventListener("submit", async function(event) {
	event.preventDefault();

	formData = new FormData(this);
	formData.set("Name", formData.get("Name").trim());
	formData.set("Surname", formData.get("Surname").trim());

	if (!checkCorrect(formData.get("Name"))) {
		alert("Имя введено некорректно. Оно может содержать только кириллические буквы, первая из которых заглавная, а также дефис.");
		return;
	} else if (!checkCorrect(formData.get("Surname"))) {
		alert("Фамилия введена некорректно. Она может содержать только кириллические буквы, первая из которых заглавная, а также дефис.");
		return;
	} else if (!(await checkLexis(formData.get("Name").toLowerCase()))) {
		alert("Имя содержит нецензурную лексику!");
		return;
	} else if (!(await checkLexis(formData.get("Surname").toLowerCase()))) {
		alert("Фамилия содержит нецензурную лексику!");
		return;
	} else if (!(await checkLexis(formData.get("Team").trim().toLowerCase()))) {
		alert("Название команды содержит нецензурную лексику!");
		return;
	}

	let response = await fetch('inc/reg.php', {
		method: 'POST',
		body: formData
	});

	let result = await response.text();
	console.log(result);

	if (result == "") {
		alert("Успешно!");
		window.location.href = "index.php";
	} else if (result == "1")
		alert("Данная почта уже зарегистрирована!");
});