<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require_once 'connect.php';

$login = $_POST["Email"];

$sql = "SELECT * FROM users WHERE Email = '$login'";
$result = $connect->query($sql);
if ($result->fetch()) die("1");

$sql = "INSERT INTO users (Email, Password, Telegram, Name, Surname, Stage, Course, Faculty, Team, IsAdmin, Timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?)";
$stmt = $connect->prepare($sql);
$stmt->execute(array($_POST["Email"], $_POST["Password"], $_POST["Telegram"], $_POST["Name"], $_POST["Surname"], $_POST["Stage"], $_POST["Course"], $_POST["Faculty"], $_POST["Team"], '' . time()));

// $user = pg_query_params ($connect, "SELECT * FROM users WHERE Email = $1", [$login]);
// if (pg_num_rows ($user)) die ("1");

// pg_query_params ($connect, "INSERT INTO users (Email, Password, Telegram, Name, Surname, Stage, Course, Faculty, Team, IsAdmin) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)", [$_POST["Email"], $_POST["Password"], $_POST["Telegram"], $_POST["Name"], $_POST["Surname"], $_POST["Stage"], $_POST["Course"], $_POST["Faculty"], $_POST["Team"], 0]);

?>