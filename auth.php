<?php

require_once 'inc/connect.php';
require_once 'inc/check_auth.php';
if (check_auth())
	header('Location: /');

require_once 'php/header.php';
require_once 'php/footer.php';

get_header("Авторизация");

?>

<div class="wrapper">
	<form>
		<div class="mb-3">
			<label for="email" class="form-label">Адрес электронной почты</label>
			<input type="email" name="login" class="form-control" id="email" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Пароль</label>
			<input type="password" name="password" class="form-control" id="password" required>
		</div>
		<button type="submit" class="btn btn-primary">Войти</button>
	</form>
</div>
<script src="js/auth.js?time=<?php echo time() ?>"></script>

<?php get_footer(); ?>