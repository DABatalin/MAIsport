<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['SERVER_NAME'] != "armaistling") {
	$connect = new PDO("mysql:host=localhost;dbname=n90387dc_arm", "n90387dc_arm", "L1e2K3o4");
} else {
	$connect = new PDO("mysql:host=localhost;dbname=arm", "Platon", "RJDc6k2mMgyKuarb");
// $connect = pg_connect ("host=localhost dbname=arm user=postgres password=123");
}

// $sql = "ALTER TABLE users DROP COLUMN timestamp;";
// $sql = "ALTER TABLE users ADD COLUMN Timestamp CHAR(10) NOT NULL;";
// $sql = "UPDATE users SET Timestamp='" . time() . "'";

// $sql = "DROP TABLE users";

// $sql =  "
// 	CREATE TABLE users
// 	(
// 	    Id INTEGER AUTO_INCREMENT PRIMARY KEY,
// 	    Email VARCHAR(255) NOT NULL,
// 	    Password VARCHAR(255) NOT NULL,
// 	    Telegram VARCHAR(255) NOT NULL,
// 	    Name VARCHAR(255) NOT NULL,
// 	    Surname VARCHAR(255) NOT NULL,
// 	    Stage VARCHAR(16),
// 	    Course CHAR(1),
// 	    Faculty VARCHAR(255),
// 	    Team VARCHAR(255),
// 	    Regalia TEXT,
// 	    IsAdmin BOOL NOT NULL
// 	);
// ";

// $connect->exec($sql);

// $sql =  "
// 	CREATE TABLE session
// 	(
// 		Id CHAR(32) NOT NULL,
//  		Id_user INT NOT NULL
// 	);
// ";

// $connect->exec($sql);

?>