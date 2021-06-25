<?php
	require_once("dbconnect.php");
	session_start();
	if (isset($_POST['access'])) {
		$query = "UPDATE orders SET access = 1 where record_id = ".$_POST['access']."";
		$result = mysqli_query($dbcon, $query);
		if (!result) die("Ошибка выполнения запроса") . mysql_error();
	}

	if (isset($_POST['delete'])) {
		$query = "DELETE FROM orders where record_id = ".$_POST['delete']."";
		$result = mysqli_query($dbcon, $query);
		if (!result) die("Ошибка выполнения запроса") . mysql_error();
	}

	if ($_SESSION ["category"] == "user") {
		header("location: user.php");
	}
	else header("location: admin.php");
?>