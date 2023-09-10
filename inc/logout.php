<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require_once 'connect.php';
require_once 'check_auth.php';

if (check_auth()) {
	$connect->exec("DELETE FROM session WHERE Id = '{$_COOKIE['session-id']}'");
	setcookie("session-id", $_COOKIE['session-id'], time() - 1, "/");
}

// if (check_auth()) {
// 	pg_query_params($connect, "DELETE FROM session WHERE Id = $1", [$_COOKIE['session-id']]);
// 	setcookie("session-id", $_COOKIE['session-id'], time() - 1, "/");
// }

header("Location: /");

?>