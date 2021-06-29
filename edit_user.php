<?php 
	require_once("dbconnect.php");
	$query = "SELECT user_id, category from users";
	$result = mysqli_query($dbcon, $query);
	if(!$result) die ("Ошибка выполнения запроса") . mysql_error();
	while ($row = mysqli_fetch_assoc($result)) {
		$userid = $row['user_id'];
		if (!empty($_POST[$userid]) && $_POST[$userid] != $row['category']) {
			$query = "UPDATE users SET category = '$_POST[$userid]' where user_id = '$userid'";
			$result2 = mysqli_query($dbcon, $query);
			if (!result2) die("Ошибка выполнения запроса") . mysql_error();
		}
	}
	header("location: admin.php");
?>