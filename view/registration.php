
<div class=" form">
 <div class="container">
<form action="registration" method="POST" class="form-group">
		<div class="form-group center-block form-row">
		<div class="top-cover center-block form-row ">
		<div class="form-group col-md-8 " id="name group">
			<label for="name " >Имя</label>
			<input type="text" name="name" class="form-control " id='name'>
			<span class="text-danger" id="error_name"></span>
			</div>
			<div class="form-group col-md-8 ">
			<label for="surname">Фамилия</label>
			<input type="text" name="surname" class="form-control" id='surname'>
			<span class="text-danger" id="error_surname"></span>
			</div>
			<div class="form-group col-md-8 ">
			<label for="password">Пароль</label>
			<input type="password" name="password" class="form-control" id='password'>
			<span class="text-danger" id="error_pass"></span>
			</div>
			<div class="form-group col-md-8 ">
			<label for="repassword">Подтверждение пароля</label>
			<input type="password" name="repassword" class="form-control" id='repass'>
			<span class="text-danger" id="error_repass"></span>
			</div>
			<div class="form-group col-md-8 ">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" id='email'>
			<span class="text-danger" id="error_email"></span>
			</div>
			<div class="form-group col-md-8">
			<label for="sex" >Пол</label>
			<select  name="sex" class="form-control" id ='sex'>
				<option selected="">Мужской</option>
				<option>Женский</option>
			</select>
			<span class="text-danger" id="error_surname"></span>
			</div>
			<div class="form-group col-md-8">
			<label for="mark">Кол-во баллов</label>
			<input type="number" name="mark" min = '300' max ='700' class="form-control" id='mark'>
			<span class="text-danger" id="error_marks"></span>
			</div>
			<div class="form-group col-md-8 ">
			<label for="birth">Дата рождение</label>
			<input type="date" name="birth" class="form-control" id ='birth'>
			<span class="text-danger" id="error_date"></span>
			</div>
			<div class="form-group col-md-8 ">
			<button type="button" class="btn btn-outline-success" id='submit'>Отправить</button>
			</div>
		</div>
		</div>

	</form>
	</div>
	</div>