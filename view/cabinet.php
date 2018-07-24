<body>
	<div class= "container">
		<div class="row">
			<div class="cabinet">
				<form class="form-group">
					<?php foreach ($date as $value) { ?>
					<div class="form-group col-md-12 ">
					<label for="name " >Имя</label>
					<input type="text" name="name" class="form-control " id='name' readonly value=<?=$value['name']?> >
					<div class="checkbox form-check-inline">
  					<input type="checkbox" value="selecte">Изменить
					</div>
					<span class="text-danger" id="error_name"></span>
					</div>
					<div class="form-group col-md-12 ">
					<label for="surname">Фамилия</label>
					<input type="text" name="surname" class="form-control" id='surname' readonly value=<?=$value['surname']?>>
					<div class="checkbox form-check-inline" id='test'>
  					<input type="checkbox" value="selecte">Изменить
					</div>
					<span class="text-danger" id="error_surname"></span>
					</div>
					<div class="form-group col-md-12">
					<label for="mark">Кол-во баллов</label>
					<input type="number" name="mark" min = '300' max ='700' class="form-control" id='mark' readonly value=<?=$value['mark']?>>
					<div class="checkbox form-check-inline">
  					<input type="checkbox" value="selecte">Изменить
					</div>
					<span class="text-danger" id="error_marks"></span>
					</div>
					<div class="form-group col-md-12 ">
					<label for="birth">Дата рождение</label>
					<input type="date" name="birth" class="form-control" id ='birth' readonly value=<?=$value['birth']?>>
					<div class="checkbox form-check-inline">
  					<input type="checkbox" value="selecte">Изменить
					</div>
					<span class="text-danger" id="error_date"></span>
					</div>
					<div class="form-group col-md-12 ">
					<?php } ?>
					<button type="button" class="btn btn-outline-success" id='change'>Отправить</button>
					
					</div>
				</form>
			</div>
		</div>
	</div>

</body>