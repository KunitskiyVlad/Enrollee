<?php
namespace App\Modell;
	class modell_validation extends modell
	{
		public $error_message = array();
		public $data = array();
		public $have_error = false;

		public function __construct($input)
		{	parent::__construct();
			foreach ($input as $key => $value) 
			{
			$this->data[$key] = isset($value) ? $value :null;			
			}
			
		}
		
		public function corectName()
		{   if($this->data['name'] == null){
			$this->error_message['error_name'] ='Поле пустое';
			return $this->have_error = true;
		}
			elseif(strlen($this->data['name']) < 3)
			{
				 $this->error_message['error_name'] ='Имя слишком короткое';
			return $this->have_error = true;
		}
			elseif (strlen($this->data['name']) > 20) 
			{
				 $this->error_message['error_name'] = 'Имя слишком длинное';
				return $this->have_error = true;
			}
			elseif (!preg_match('/^[a-zа-яё]+$/iu', $this->data['name'] )) {
				 $this->error_message['error_name'] = 'Допустим ввод только букв';
				return $this->have_error = true;
			}
		
			else
				return true;
		}

		public function checkPass()
		{	
			if($this->data['pass'] == null){
			$this->error_message['error_pass'] ='Поле пустое';
			return $this->have_error = true;
		}

			elseif(strlen($this->data['pass']) < 6){
				$this->error_message['error_pass'] ='Пароль слишком короткий';
				return false;
			}
			elseif (strlen(($this->data['pass'])) > 25) 
			{
				 $this->error_message['error_pass'] = 'Слишком большой';
				return $this->have_error = true;
			}
			else
				return true;
		}
		public function confirmPass()
		{
			if( $this->data['pass'] != $this->data['repass']){
				$this->error_message['error_repass'] ='Пароли не совпадают';
				return $this->have_error = true;
			}
		else
				return true;
		}

		public function checkMarks()
		{	
			if($this->data['mark'] == null)
			{
			$this->error_message['error_marks'] ='Поле пустое';
			return $this->have_error = true;
			}
			elseif($this->data['mark'] < 300)
			{
				 $this->error_message['error_marks'] ='Сумма балов ниже допустимого';
				return $this->have_error = true;
			}
			elseif ($this->data['mark'] > 700) 
			{
				 $this->error_message['error_marks'] = 'Сумма баллов превышает максимум';
				return $this->have_error = true;
			}
			else
				return true;
		}

		public function CheckSurname()
		{
			if($this->data['surname'] == null)
			{
			$this->error_message['error_surname'] ='Поле пустое';
			return $this->have_error = true;
			}
		elseif(strlen($this->data['surname']) < 3){
				 $this->error_message['error_surname'] ='Фамилия слишком короткая';
			return $this->have_error = true;
		}
			elseif (strlen($this->data['surname']) > 20) 
			{
				 $this->error_message['error_surname'] = 'Фамилия слишком длинная';
				return $this->have_error = true;
			}
			elseif (!preg_match('/^[a-zа-яё]*$/iu', $this->data['surname'] )) {
				 $this->error_message['error_surname'] = 'Допустим ввод только букв';
				return $this->have_error = true;
			}
			else
				return true;
		}

		public function checkEmail()
		{	//var_dump( $this->data);
			if(!preg_match('/.+@.+\..+/i', $this->data['email']))
			{
				$this->error_message['error_email'] ='Некореткный email';
				return $this->have_error = true;
			}
			elseif($this->bd->Count('users', $this->data['email'], 'email') > 0){
				$this->error_message['error_email'] ='Такой email уже существует';
				return $this->have_error = true;
			}
			else
				return true;
		}

		public function checkDate()
		{
			$array= explode('-', $this->data['birth']);
				if(!checkdate($array[1],$array[2], $array[0]))
				{
					 $this->error_message['error_date'] = 'Неверно указаный формат даты';
					 return $this->have_error = true;
				}
				else
				{
				  $birthday_timestamp = strtotime($this->data['birth']);
				  $age = date('Y') - date('Y', $birthday_timestamp);
				  if (date('md', $birthday_timestamp) > date('md')) 
				  {
				    $age--;
				  }
				  if($age > 14 and $age < 75)
				  {
				  	return true;
				  }
				  else
				  {
				  	$this->error_message['error_date'] = 'Недопустимы возраст';
					return $this->have_error = true;
				  }
				}
		}
		public function writeError()
	  			{
	  					echo json_encode($this->error_message);
	  					die();
	  				}

	  			}

	