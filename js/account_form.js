function checkCorrect(value) {
	let res = /([А-Я][а-я]+)(-[А-Я][а-я]+)*/.exec(value),
	ok = res;
	if (ok)
		ok = (value == res[0]);

	return ok;
}

async function checkLexis(value) {
	let words = await (await fetch("inc/lexis.php")).text();
	words = words.split("\n");

	let result = words.some(word => value.includes(word));
	return !result;
}

let course = document.querySelector("#course"),
options_for_course = document.querySelectorAll("#course option[disabled]"),
options_for_mag = document.querySelectorAll("#course option:nth-child(3), #course option:nth-child(4)");

document.querySelector("#stage").addEventListener("change", function(event) {
	if (this.value == "Магистратура")
		options_for_mag.forEach(item => item.setAttribute("disabled", true));
	else
		options_for_mag.forEach(item => item.removeAttribute("disabled"));

	if (this.value == "Специалитет" || this.value == "Базовое высшее")
		options_for_course.forEach(item => item.removeAttribute("disabled"));
	else {
		course.value = "2";
		options_for_course.forEach(item => item.setAttribute("disabled", true));
	}
});