<?php

require_once 'inc/connect.php';
require_once 'inc/check_auth.php';
if (check_auth())
	header('Location: /');

require_once 'php/header.php';
require_once 'php/footer.php';

get_header("Регистрация");

?>

<div class="wrapper">
	<form>
		<?php require_once 'inc/account_form.php' ?>
		<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
	</form>
</div>
<script src="js/reg.js?time=<?php echo time() ?>"></script>

<?php get_footer(); ?>