<?php 
	session_start();
	require_once("dbconnect.php");
	$from_time = $_POST["time"];
	$to_time = $from_time + $_POST['worktime'];
	$problem = $_POST['problem'];
	$date = $_POST['date'];
	$repair = $_POST['repair'];
	$car = $_POST['car'];
	$user = $_SESSION ["id"];
	$query = "INSERT INTO orders(client, car, repair, date, from_time, to_time, problem) VALUES ('$user', '$car', '$repair', '$date', '$from_time', '$to_time', '$problem')";
	$result = mysqli_query($dbcon, $query);
	if (!$result) die("Ошибка выполнения запроса") . mysql_error(); 
	else header("location: user.php");
?>