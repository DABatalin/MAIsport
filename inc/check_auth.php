<?php

function check_auth() {
	global $connect;

	if (isset($_COOKIE['session-id'])) {
		$id = $_COOKIE['session-id'];
		$session = $connect->query("SELECT * FROM session WHERE Id = '$id'");
		if ($session) {
			$session = $session->fetch();
			if ($session)
				return $session["Id_user"];
		}
	}
	return false;

	// if (isset($_COOKIE['session-id'])) {
	// 	$id = $_COOKIE['session-id'];
	// 	$session = pg_query_params($connect, "SELECT * FROM session WHERE Id = $1", [$id]);
	// 	if ($session = pg_fetch_assoc($session))
	// 		return $session["id_user"];
	// 	else
	// 		return false;
	// } else {
	// 	return false;
	// }
}

?>