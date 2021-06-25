<?php
	function getTime() {
		require_once("dbconnect.php");
		$worktime = $_POST["worktime"];
		$date = $_POST["date"];
		$query = "select from_time, to_time from orders where date = '$date'";
		$result = mysqli_query($dbcon, $query);
		if (!$result) die("Ошибка выполнения запроса") . mysql_error();
		while($row = mysqli_fetch_assoc($result)){
 			$from_time[] = $row['from_time'];
			$to_time[] = $row['to_time'];
 		}
		$time = array();

		//determined free time
		$in = true;
		for ($i = 0; $i < 11; $i++) {
			if (in_array($i + 8, $to_time)) $in = true;
			if (in_array($i + 8, $from_time)) $in = false;
			if ($in) $freetime[] = $i + 8;
		}

		//determined free time for count work time
		for ($i = 0; $i < count($freetime); $i++) {
			$hour = 0;
			for($j = $i+1; $j < count($freetime); $j++) {
				$hour++;
				if ($freetime[$j] - 1 > $freetime[$j - 1]) {
					break;
				}
			}
			if ($hour >= $worktime) $time[] = $freetime[$i];
		}
		
		$data = "<option selected hidden = 'true' value=''>Выберите время</option>";
		
		if (count($time) == 0) $data = "<option selected hidden = 'true' value=''>Этот день занят</option>";
		else {
			for ($i = 0; $i < count($time); $i++) {
				 $data .= "<option value=".$time[$i].">".$time[$i].":00</option>";
			}
		}
		return $data;
	}
	
	if(!empty($_POST['date']) && !empty($_POST['worktime'])){
		echo getTime();
		exit;
	}	
?>