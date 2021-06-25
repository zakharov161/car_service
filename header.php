	<head>
		<link rel="stylesheet" href="header-style.css">
	</head>
	<header>
		<img src = "img/logo.png">
		<a href = "index.php">
			<p>АВТОСЕРВИС<br><span>онлайн</span></p>
		</a>
		<?php
			if($_SESSION ["name"] == null) {
				echo
				"<p>Необходим ремонт автомобиля?<br>Зарегистрируйтесь и запишитесь к нам бесплатно!</p>
				<a href = 'join.php'><button class = 'btn btn-primary enter'>Вход</button></a>
				<a href = 'index.php#form'><button class = 'btn btn-primary'>Регистрация</button></a>";
			}
			else {
				if($_SESSION ["category"] == 'user') $category = 'user.php';
				else $category = 'admin.php';
				echo
				"<p><a href = ".$category.">".$_SESSION ['name']."</a></p>
				<form action = 'exit.php' method = 'post'>
					<button class = 'btn btn-primary' type = 'submit'>Выход</button>
				</form>";
			}
		?>
	</header>