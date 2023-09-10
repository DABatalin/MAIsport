<?php

require_once 'inc/connect.php';
require_once 'inc/check_auth.php';
if (!check_auth())
	header('Location: /');
require_once 'inc/get_user_id.php';

require_once 'php/header.php';
require_once 'php/footer.php';

get_header("Личный кабинет");

$user_id = get_user_id();

$user = $connect->query("SELECT * FROM users WHERE Id = $user_id");
if (!($user_ = $user->fetch())) die ("Ошибка! Пользователя не удалось найти по id.");
$user = array();
foreach ($user_ as $prop => $value) {
	$user[strtolower($prop)] = $value;
}

// $user = pg_query_params($connect, "SELECT * FROM users WHERE Id = $1", [$user_id]);
// if (!pg_num_rows ($user)) die ("Ошибка! Пользователя не удалось найти по id.");
// $user = pg_fetch_assoc($user);

?>

<div class="wrapper">
	<h1>Личный кабинет</h1>
	<div class="info">
		<h2>Общая информация</h2>
		<?php require_once 'inc/account_form.php' ?>
		<button id="change_button" class="btn btn-primary" disabled>Сохранить</button>
	</div>
	<a href="/" class="mt-2 btn btn-success">На главную</a>
</div>
<script src="js/lk.js?time=<?php echo time() ?>"></script>

<?php get_footer(); ?>