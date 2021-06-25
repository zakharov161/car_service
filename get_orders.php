<?php
	require_once("dbconnect.php");
	session_start();
	$user = $_SESSION["id"];
	$query = "SELECT *, repair.name as repair_name
		FROM orders 
		JOIN repair 
		on orders.repair = repair.repair_id 
		JOIN users
		on users.user_id = orders.client ";

	if ($_SESSION ["category"] == "user") {
		$query .= "where users.user_id = '$user'";
		$margin = "margin-top: 20px; font-size: 22px";
	}

	$result = mysqli_query($dbcon, $query);
	if (!result) die("Ошибка выполнения запроса") . mysql_error();
	$row_cnt = $result->num_rows;

	if ($row_cnt == 0) echo 
	"<div class = 'row mt-4'>
		<div class = 'col-12 text-center orders'>
			<h4>У вас нет заявок на ремонт</h4>
		</div>
	</div>";
	else {
		while($row = mysqli_fetch_assoc($result)) {
			$worktime = $row['to_time'] - $row['from_time'];
			$repair = strstr($row['repair_name'], '(', true);
			echo 
			"<div class = 'row mt-4 reg list'>
				<div class = 'col-10'>
					<p style = '".$margin."'>
						Заявка №".$row['record_id']."<br>
						Дата: ".$row['date']."<br>
						Время: ".$row['from_time'].":00<br>
						Требуемое количество времени на работы: ".$worktime."ч<br>
						Машина: ".$row['car']."<br>
						Стоимость работ: ".$row['price']." рублей<br>";
						if ($_SESSION ["category"] == "admin") {
							echo "".$row['name']."<br>".$row['phone']."";
						}
					echo
					"</p>
				</div>
				<div class = 'col-2'>";
				if ($row['access'] == 0) echo 
					"<span>В обработке</span>";
					else echo 
					"<span style = 'background-color: green'>Подтвержден</span>";
				echo
				"</div>
				<div class = 'col-12 serv'>
					<span>".$repair."</span>
				</div>
				<div class = 'col-12 description'>
					<p>".$row['problem']."</p>
				</div>
				<div class = 'buttons'>";
					if ($_SESSION ["category"] == "user" || $row['access'] == 1) echo
						"<button type='submit' form='form' name = 'delete' value = '".$row['record_id']."' class = 'btn apply cancel'>Отменить</button>";
					else echo "<button type='submit' form='form' name = 'access' value = '".$row['record_id']."' class = 'btn apply'>Подтвердить</button>
						<button type='submit' form='form' name = 'delete' value = '".$row['record_id']."' class = 'btn apply cancel'>Отменить</button>";
					echo
				"</div>
			</div>
			<form id = 'form' method = 'POST' action = 'apply_order.php'></form>";
		}
	}
?>
		