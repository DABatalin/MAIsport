<?php

$is_reg = !isset($user);
if ($is_reg) {
	$user = array(
		"email" => "",
		"password" => "",
		"telegram" => "@",
		"name" => "",
		"surname" => "",
		"stage" => "Бакалавриат",
		"course" => 2,
		"faculty" => "Институт №8 «Информационные технологии и прикладная математика»",
		"team" => ""
	);
}

?>

<div class="mb-3">
	<label for="email" class="form-label">Адрес электронной почты</label>
	<input type="email" name="Email" class="form-control" id="email" aria-describedby="emailHelp" <? echo "value=\"{$user['email']}\"" ?> required>
	<div id="emailHelp" class="form-text">Она будет использоваться в качестве логина при входе на портал</div>
</div>
<div class="mb-3">
	<label for="password" class="form-label">Пароль</label>
	<input <? if (!$is_reg) echo "type=\"text\"" ?> type="password" name="Password" class="form-control" id="password" aria-describedby="passwordHelp" <? echo "value=\"{$user['password']}\"" ?> required>
	<div id="passwordHelp" class="form-text">Главное запомнить введенный пароль :)</div>
</div>
<div class="mb-3">
	<label for="telegram" class="form-label">Telegram</label>
	<input type="text" name="Telegram" class="form-control" id="telegram" aria-describedby="telegramHelp" <? echo "value=\"{$user['telegram']}\"" ?> required>
	<div id="telegramHelp" class="form-text">Исключительно для связи с вами</div>
</div>
<div class="mb-3">
	<label for="name" class="form-label">Имя</label>
	<input type="text" name="Name" class="form-control" id="name" <? echo "value=\"{$user['name']}\"" ?> required <? if (!$is_reg) echo "disabled" ?>>
</div>
<div class="mb-3">
	<label for="surname" class="form-label">Фамилия</label>
	<input type="text" name="Surname" class="form-control" id="surname" aria-describedby="surnameHelp" <? echo "value=\"{$user['surname']}\"" ?> required <? if (!$is_reg) echo "disabled" ?>>
	<div id="surnameHelp" class="form-text">Имя и фамилия будут фигурировать в списках участников соревнования и турнирной сетке</div>
</div>
<div class="mb-3">
	<label for="faculty" class="form-label">Выберите факультет</label>
	<select name="Faculty" id="faculty" class="form-select" aria-label="" required>
		<option value="Институт №1 «Авиационная техника»">Институт №1 «Авиационная техника»</option>
		<option value="Институт №2 «Авиационные, ракетные двигатели и энергетические установки»">Институт №2 «Авиационные, ракетные двигатели и энергетические установки»</option>
		<option value="Институт №3 «Системы управления, информатика и электроэнергетика»">Институт №3 «Системы управления, информатика и электроэнергетика»</option>
		<option value="Институт №4 «Радиоэлектроника, инфокоммуникации и информационная безопасность»">Институт №4 «Радиоэлектроника, инфокоммуникации и информационная безопасность»</option>
		<option value="Институт №5 «Экономика и менеджмент высокотехнологичной индустрии»">Институт №5 «Экономика и менеджмент высокотехнологичной индустрии»</option>
		<option value="Институт №6 «Аэрокосмический»">Институт №6 «Аэрокосмический»</option>
		<option value="Институт №7 «Робототехнические и интеллектуальные системы»">Институт №7 «Робототехнические и интеллектуальные системы»</option>
		<option value="Институт №8 «Информационные технологии и прикладная математика»">Институт №8 «Информационные технологии и прикладная математика»</option>
		<option value="Институт №9 «Институт общеинженерной подготовки»">Институт №9 «Институт общеинженерной подготовки»</option>
		<option value="Институт №10 «Институт иностранных языков»">Институт №10 «Институт иностранных языков»</option>
		<option value="Институт №11 «Материаловедения и технологий материалов»">Институт №11 «Материаловедения и технологий материалов»</option>
		<option value="Институт №12 «Аэрокосмические наукоёмкие технологии и производства»">Институт №12 «Аэрокосмические наукоёмкие технологии и производства»</option>
	</select>
</div>
<div class="mb-3">
	<label for="stage" class="form-label">Выберите ступень обучения</label>
	<select name="Stage" id="stage" class="form-select" required>
		<option value="Бакалавриат">Бакалавриат</option>
		<option value="Магистратура">Магистратура</option>
		<option value="Аспирантура">Аспирантура</option>
		<option value="Специалитет">Специалитет</option>
		<option value="Базовое высшее">Базовое высшее</option>
	</select>
</div>
<div class="mb-3">
	<label for="course" class="form-label">Выберите курс</label>
	<select name="Course" id="course" class="form-select" required>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5" disabled>5</option>
		<option value="6" disabled>6</option>
	</select>
</div>
<div class="mb-3">
	<label for="team" class="form-label">Команда</label>
	<input type="text" name="Team" class="form-control" id="team" aria-describedby="teamHelp" placeholder="zzz" <? echo "value=\"{$user['team']}\"" ?>>
	<div id="teamHelp" class="form-text">От какой команды выступаете? (простор для творчества, необязательно)</div>
</div>

<script>
	<?php foreach (["faculty", "stage", "course"] as $prop) { ?>
		document.querySelectorAll("#<?php echo $prop; ?> option").forEach(option => {
			if (option.value == "<?php echo $user[$prop]; ?>")
				option.setAttribute("selected", true);
		});
	<?php } ?>
</script>
<script src="js/account_form.js?time=<?php echo time() ?>"></script>