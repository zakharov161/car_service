<?php
	require_once("dbconnect.php");
	session_start();
	$sql = "select time from repair where repair_id = ".$_REQUEST['id_repair']."";
	$result = $dbcon -> query($sql);
	if (!$result) die("Ошибка выполнения запроса") . mysql_error();
	if ($myrow = $result -> fetch_array()) $time = $myrow['time'];
	echo $time;
?>