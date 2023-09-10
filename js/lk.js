let change_button = document.querySelector("#change_button"),
props = new Set();

document.querySelectorAll(".info input, .info select").forEach(item => item.addEventListener("change", function(event) {
	change_button.removeAttribute("disabled");
	props.add(this.name);
}));

change_button.addEventListener("click", async function(event) {
	let formData = new FormData();
	for (let prop of props) {
		let elem = document.querySelector(`[name=${prop}]`);
		if (elem.value == "" && elem.hasAttribute("required")) {
			alert(`Обязательное поле не может быть пустым!`);
			elem.style.backgroundColor = "red";
			await new Promise(resolve => setTimeout(resolve, 1000));
			elem.removeAttribute("style");
			this.setAttribute("disabled", true);
			return;
		}
		formData.append(prop, elem.value);
	}

	if (formData.has("Team")) {
		let ok = await checkLexis(formData.get("Team").trim().toLowerCase());
		if (!ok) {
			alert("Название вашей команды содержит нецензурную лексику!");
			return;
		}
	}

	let response = await fetch("inc/change_info.php", {
		method: 'POST',
		body: formData
	});
	let result = await response.text();
	alert("Успешно!");

	props.clear();
	this.setAttribute("disabled", true);
});