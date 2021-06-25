<?php 
	session_start();
    if ($_SESSION ["category"] != 'admin') {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Панель администратора</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_user.css">
</head>
<body>
	<?php require("header.php"); ?>
	<main>
		<h2 style = "margin: -40px 0px -10px -14px">Список заявок</h2>
		<?php require("get_orders.php") ?>
	</main>
	<?php require("footer.php"); ?>
</body>
</html>