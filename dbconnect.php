<?php
	$dbcon = mysqli_connect("localhost", "root", "root", "service");
	if ($mysqli -> connect_errno) {
		printf("Не удалось подключиться", $mysqli -> connect_error);
	}
?>