<?php
function get_header($title) {
?>
	<!DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><? echo $title; ?></title>
	</head>
	<body>
<?php } ?>