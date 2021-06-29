<?php
	session_start();
	    if ($_SESSION ["category"] != 'user') {
        header("location: index.php");
    }
	require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Личный кабинет</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_user.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/datepicker.js"></script>
	
</head>
<body>
	<?php require("header.php"); ?>
	</header>			
	<main>
		<div class = "reg">				
			<form class = "text-center" method = "post" action = "action_order.php">
				<h1>Заявка на ремонт</h1>
				<input required name = "car" placeholder="Автомобиль (Марка, модель, год, тип КПП)" class = "form-control">
				<select name = "repair" id = "repair" required class="form-select" style = "height: 50px; margin-top: 20px;">
  					<option value = "" hidden = "true">Выберите область ремонта</option>
  					<?php 
						$sql = "select * from repair";
						$res = mysqli_query($dbcon, $sql);
						while($object = mysqli_fetch_object($res)){
  							echo "<option value = '$object->repair_id'>$object->name</option>";
						}						
  					?>
  					<script>
						var time;
						$('#repair').change(function()	{
							var ajax = $.ajax({
								type: "POST",
								url: "get_work_time.php",
								data: "id_repair="+$("#repair").val(),
								global: false,
								async: false,
								success: function(data) {
									return data;
								}
							}).responseText;
							time = ajax;
						});
					</script>
				</select>
				<input  id = "datepicker" required name = "date" placeholder="Выберите дату" class = "form-control date" style = "width: 50%;">
				<script>
 					$('#datepicker').datepicker({
					minDate: 1,
					onSelect : function(dateText, inst) {
					var date = $(this).val();
					$('.time').load('get_free_time.php', {date: date, worktime : time});
					$("#worktime").val(time);
 					}
					});
				</script>
				
				<select name = "time" required class="form-select time" style = "height: 50px; margin-top: 20px; margin-left: auto; width: 45%;">
  					<option selected value = "" hidden = "true">Выберите время</option>
				</select>
				<textarea required name = "problem" rows = "5"  placeholder="Описание проблемы" class = "form-control mt-4"></textarea>
				<button value = "" id = "worktime" name = "worktime" class = "btn btn-primary mt-4" type = "submit">ЗАПИСАТЬСЯ</button>
			</form>		
		</div>
		<h4 class = "text-center mt-4">Запишитесь в автосервис за три простых шага</h4>
		<div class = "row mt-4 order">
			<div class = "col-2 offset-2 mt-3">
				<img src="img/order.png">
				<h5 class><span>1</span>Бесплатная заявка</h5>
				<p>Поделитесь своей проблемой, заполнив и отправив заявку в форме</p>
			</div>
			<div class = "col-2 offset-1 mt-3">
				<img src="img/order.png">
				<h5 class><span>2</span>Подтверждение</h5>
				<p>Дождитесь звонка менеджера, чтобы подтвердить заявку</p>
			</div>
			<div class = "col-2 offset-1 mt-3">
				<img src="img/order.png">
				<h5 class><span>3</span>Ждём вас</h5>
				<p>Призжайте к нам в назначенное время</p>
			</div>
		</div>
		<h2 style = "margin: 20px 0px 0px -14px">Мои заявки</h2>
		<?php require("get_orders.php") ?>
		<div class = "row mt-3">
			<div class = "col-12 mt-5">
				<p>
					АВТОСЕРВИС онлайн - уникальный проект, позволяющий быстро и удобно подать заявку на ремонт<br><br>
					Как это работает? Наши клиенты в личном кабинете оставляют заявку на сайте с описанием нужной услуги. Заявки по ремонту принимаются круглосуточно, регистрация не нужна, а сервис полностью бесплатен. После заполнения простой формы заявки, наш менеджер перезвонит вам в ближайшее время для согласования заявки. После подтверждения заявки вы можете приехать к нам в назначенное вами время.
				</p>
			</div>
		</div>
	</main>
	<?php require("footer.php"); ?>
</body>
	<?php require("modal.php"); ?>
</html>