		<h2 class = "text-center mt-5" id = "form">Нужен ремонт? Зарегистрируйтесь и запишитесь к нам в личном кабинете в любое подходящее для вас время!</h2>
		<div class = "row reg">
			<div class = "col-12 text-center">
				<h1>Регистрация</h1>				
			</div>
			<form method = "post" action = "action_reg.php" class = "col-4 offset-4 text-center">
				<input required name = "name" placeholder="Имя" class = "form-control">
				<input required type = "tel" name = "phone" placeholder="Телефон" class = "form-control">
				<input required type = "password" name = "password" placeholder="Пароль" class = "form-control password">
				<input required type = "password" placeholder="Подтверждение пароля" class = "form-control cor_password">
				<script>
					$(".cor_password").on("keyup", function() { // Выполняем скрипт при изменении содержимого 2-го поля
						var value_input1 = $(".password").val(); // Получаем содержимое 1-го поля
						var value_input2 = $(this).val(); // Получаем содержимое 2-го поля
						if(value_input1 != value_input2) { // Условие, если поля не совпадают
							$(".cor_password").css('border','2px solid red');
							$("#submit").attr("disabled", "disabled"); // Запрещаем отправку формы
						} 
						else { // Условие, если поля совпадают
							$("#submit").removeAttr("disabled");  // Разрешаем отправку формы
							$(".cor_password").css('border','none');
						}		
					});
				</script>
				<button required type = "submit" name = "but" id = "submit" placeholder="" class = "btn btn-primary mt-4">Зарегистрироваться</button>
			</form>
		</div>