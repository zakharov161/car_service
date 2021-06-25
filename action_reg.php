<?php
	session_start();
	require_once("dbconnect.php");
	$phone = $_POST["phone"];
	$name = $_POST["name"];
	$password = $_POST["password"];
	if ($result = $dbcon->query("SELECT phone FROM users WHERE phone = '$phone'")) {
    	/* определение числа рядов в выборке */
    	$row_cnt = $result->num_rows;
		/* закрытие выборки */
    	$result->close();
    }
 	if ($row_cnt > 0) {
		$_SESSION["message"] = "Такой пользователь уже есть!";
		$dbcon->close;
	}
    else {
    	$query = "INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$password')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
    	$result = mysqli_query($dbcon, $query) or die(mysqli_error($dbcon)); // Отправляем переменную с запросом в базу данных
        $_SESSION["message"] = "Вы успешно зарегистрировались!";
    }
	header("location: index.php");
?>