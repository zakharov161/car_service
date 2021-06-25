<?php
	session_start();
	require_once("dbconnect.php");
	$phone = $_POST["phone"];
	$password = $_POST["password"];
	$_SESSION ["name"] = null;
	
	$mysql = "select * from users where (phone = '$phone' and password = '$password');";
	$result = $dbcon -> query($mysql);
	
	if (!$result) die("Ошибка выполнения запроса") . mysql_error();
	if ($myrow = $result -> fetch_array()) {
		$_SESSION ["name"] = $myrow["name"];
		$_SESSION ["id"] = $myrow["user_id"];
		$_SESSION ["category"] = $myrow["category"];
	}
	else {
		$_SESSION ["message"] = "Некорректный логин или пароль";
		header("Location: join.php");
	}
	if ($_SESSION ["category"] == "user") header("Location: user.php");
	if ($_SESSION ["category"] == "admin") header("Location: admin.php");
?>
	