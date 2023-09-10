<?php

require_once 'connect.php';
require_once 'get_user_id.php';

$user_id = get_user_id();

$sql = "UPDATE users SET";
foreach ($_POST as $prop => $value) {
	if (is_string($value))
		$sql .= " $prop='$value',";
	else
		$sql .= " $prop=$value,";
}
$sql = rtrim($sql, ",");

$sql .= " WHERE Id = $user_id";
$connect->query($sql);

// $sql .= " WHERE Id = $1";
// $users = pg_query_params($connect, $sql, [$user_id]);

?>