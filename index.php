<?php

require_once 'inc/connect.php';
require_once 'inc/check_auth.php';
$is_auth = check_auth();

require_once 'php/header.php';
require_once 'php/footer.php';

get_header("Главная страница");

?>

<div class="wrapper">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Имя</th>
				<th scope="col">Фамилия</th>
				<th scope="col">Команда</th>
				<th scope="col">Курс</th>
				<th scope="col">Ступень</th>
				<th scope="col">Институт</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM users";
				$result = $connect->query($sql);
				for ($i = 1; $user = $result->fetch(); $i++) {
			?>
					<tr>
						<th scope='row'><? echo $i ?></th>
						<td><? echo $user['Name'] ?></td>
						<td><? echo $user['Surname'] ?></td>
						<td><? echo $user['Team'] ?></td>
						<td><? echo $user['Course'] ?></td>
						<td><? echo $user['Stage'] ?></td>
						<td><? echo $user['Faculty'] ?></td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<?php if (!$is_auth) { ?>
		<a class="btn btn-primary" href="reg.php">Зарегистрироваться тоже!!!</a>
		<a class="btn btn-info" href="auth.php">Уже, хочу войти</a>
	<?php } else { ?>
		<a class="btn btn-success" href="lk.php">Личный кабинет</a>
		<a class="btn btn-danger" href="inc/logout.php">Выйти</a>
	<?php } ?>
</div>

<?php get_footer(); ?>