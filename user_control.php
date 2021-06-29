		<h2 style = "margin: 0px 0px 0px -12px;">Пользователи</h2>
		<div class = "row text-center p-2 mt-3 text-secondary" style = "box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.1);">
			<div class = "col-4 p-2">
				<h4>Имя</h4>
			</div>
			<div class = "col-4 p-2">
				<h4>Телефон</h4>
			</div>
			<div class = "col-4 p-2">
				<h4>Категория</h4>
			</div>
			<hr>
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					$user = "Пользователь";
					if ($row['category'] == 'admin') $user = "Администратор";
					elseif ($row['category'] == 'manager') $user = "Менеджер";
					echo 
					"<div class = 'col-4'>
						<h5 style = 'color: black;' class = 'p-1'>".$row['name']."</h5>
					</div>
					<div class = 'col-4'>
						<h5 style = 'color: black;' class = 'p-1'>".$row['phone']."</h5>
					</div>
					<div class = 'col-4'>
					<select form = 'form2' name = '".$row['user_id']."' class = 'form-group' style = 'border: 1px solid #9b9b9b; border-radius: 5px; font-size: 18px; font-weight: 600; padding: 5px; margin-top: -5px'>
						<option value = '' hidden = 'true'>".$user."</option>
						<option value = 'admin'>Администратор</option>
						<option value = 'manager'>Менеджер</option>
						<option value = 'user'>Пользователь</option>
					</select>
					</div>
					<hr>";
				}
			?>
			<form id = 'form2' action = 'edit_user.php' method = 'post'>
					<button class = 'btn btn-primary' style = "margin: 10px 0px; width: 120px" type = 'submit'>Сохранить</button>
			</form>
		</div>