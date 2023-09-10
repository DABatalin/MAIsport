<?php
	function get_user_id() {
		global $connect;
		$session_id = $_COOKIE['session-id'];

		$sql = "SELECT * FROM session WHERE Id = '$session_id'";
		$result = $connect->query($sql);
		$session = $result->fetch();
		$user_id = $session["Id_user"];

		// $session = pg_query_params($connect, "SELECT * FROM session WHERE Id = $1", [$session_id]);
		// $session = pg_fetch_assoc($session);
		// $user_id = $session["id_user"];

		return $user_id;
	}
?>