<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'connect.php';

$login = $_POST["login"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE Email = '$login'";
$result = $connect->query($sql);
if (!($user = $result->fetch())) die("1");
if ($user["Password"] != $password) die("2");

$id = md5((int)time() + (double)microtime());
$sql = "INSERT INTO session VALUES ('$id', {$user['Id']})";
$connect->query($sql);
setcookie("session-id", $id, time()+60*60*24*30, "/");

// $users = pg_query_params($connect, "SELECT * FROM users WHERE Email = $1", [$login]);
// if (!pg_num_rows ($users)) die ("1");
// $user = pg_fetch_assoc($users);
// if ($user["password"] != $password) die("2");

// $id = md5((int)time() + (double)microtime());
// pg_query_params($connect, "INSERT INTO session VALUES ($1, $2)", [$id, $user["id"]]);
// setcookie("session-id", $id, time()+60*60*24*30, "/");

?>