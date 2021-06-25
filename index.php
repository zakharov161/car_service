<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Автосервис онлайн</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require("header.php"); ?>
	<main>
		<div class = "row advance">
			<h1 class = "col-5">Автосервис <span>онлайн</span></h1>
			<img src = "img/header_content1.png" class = "col-1 offset-2">
			<img src = "img/header_content2.png" class = "col-1">
			<img src = "img/header_content3.png" class = "col-1">
			<img src = "img/header_content4.png" class = "col-1">
		</div>
		<div class = "row">
			<div class = "col-12 mt-5 main-logo">
				<img src="img/main.png" width="100%">
				<h1>
					25 лет опыта<br>
					Тысячи довольных клиентов<br>
					Комптентные сотрудники<br>
					Демократичные цены
				</h1>
			</div>
		</div>
		<div class = "row service">
			<div class = "col-12 text-center">
				<h2>Предоставляем полный спектр услуг по ремонту автомобилей</h2>
			</div>
			<div class = "col-6 mt-5 text-center">
				<img src = "img/service1.png">
				<h3 class = "mt-2 display-6">Все виды диагностики</h3>
			</div>
			<div class = "col-6 mt-5 text-center">
				<img src = "img/service2.png">
				<h3 class = "mt-2 display-6">Ремонт ходовой части</h3>
			</div>
			<div class = "col-12 mt-5 text-center">
				<img src = "img/service3.png">
				<h3 class = "mt-2 display-6">Ремонт двигателя</h3>
			</div>
			<div class = "col-12 mt-5 text-center">
				<img src = "img/service4.png">
				<h3 class = "mt-2 display-6">Ремонт электрики</h3>
			</div>
		</div>
		<?php
			if ($_SESSION ["name"] == null) {
				require("registration.php");
			}
		?>
		
		<div class = "row mt-5">
			<div class = "col-12 mt-5">
				<p>
					АВТОСЕРВИС онлайн - уникальный проект, позволяющий быстро и удобно подать заявку на ремонт<br><br>
					Как это работает? Наши клиенты в личном кабинете оставляют заявку на сайте с описанием нужной услуги. Заявки по ремонту принимаются круглосуточно, регистрация не нужна, а сервис полностью бесплатен. После заполнения простой формы заявки, наш менеджер перезвонит вам в ближайшее время для согласования заявки. После подтверждения заявки вы можете приехать к нам в назначенное вами время.
				</p>
			</div>
		</div>
	</main>
	<?php require("footer.php"); ?>
	<?php require("modal.php") ?>
</body>
</html>