<?php 
	session_start();
    if ($_SESSION ["category"] == 'admin' || $_SESSION ["category"] == 'manager') {
		require_once("dbconnect.php");
		$query = "SELECT * from users order by category";
		$result = mysqli_query($dbcon, $query);
		if(!$result) die ("Ошибка выполнения запроса") . mysql_error();
    }
	else header("location: index.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if ($_SESSION ["category"] == 'admin') echo "Панель администратора"; else echo "Управление заявками" ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_user.css">
</head>
<body>
	<?php require("header.php"); ?>
	<main>
		<?php if ($_SESSION ["category"] == 'admin') require("user_control.php") ?>
		<h2 style = "margin: 30px 0px 0px -12px;">Список заявок</h2>
		<?php require("get_orders.php") ?>
	</main>
	<?php require("footer.php"); ?>
</body>
</html>