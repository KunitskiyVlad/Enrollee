
<div class=" form">
 <div class="container">
<form action="..controller/registration_controller.php" method="POST">
		<div class="form-group center-block row">
		<div class="top-cover center-block">
		<div class="form-group col-md-8 row">
			<label for="name">Имя</label>
			<input type="text" name="name" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<label for="surname">Фамилия</label>
			<input type="text" name="surname" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<label for="password">Пароль</label>
			<input type="text" name="password" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<label for="repassword">Подтверждение пароля</label>
			<input type="text" name="repassword" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<label for="sex">Пол</label>
			<select  name="sex" class="form-controll col-md-12">
				<option selected="">Мужской</option>
				<option>Женский</option>
			</select>
			</div>
			<div class="form-group col-md-8 row">
			<label for="mark">Кол-во баллов</label>
			<input type="text" name="mark" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<label for="birth">Дата рождение</label>
			<input type="data" name="birth" class="form-controll">
			</div>
			<div class="form-group col-md-8 row">
			<button type="submit" class="btn btn-outline-success">Отправить</button>
			</div>
		</div>
		</div>

	</form>
	</div>
	</div>