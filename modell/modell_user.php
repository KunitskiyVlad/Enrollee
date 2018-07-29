<?php
	
	class user extends modell
	{	public $user = array();
		public $chengeData = array();
		
		public function __construct()
		{
			parent::__construct();
			if(isset($_COOKIE['user'])){
			if(user::CheckCookie())
			{
				$this->user = $this->bd->selectOne('users', htmlspecialchars($_COOKIE['user']) , 'hash');
			}
			else
				require false;
		}
			else
			{
				return false;
			}
		}
		public function changeUser()
		{
			if(isset($_POST['name']))
			{
				$this->chengeData['name'] =htmlspecialchars(trim($_POST['name']));
			}
			if(isset($_POST['surname']))
			{
				$this->chengeData['surname'] =htmlspecialchars(trim($_POST['surname']));
			}
			if(isset($_POST['mark']))
			{
				$this->chengeData['mark'] =htmlspecialchars(trim($_POST['mark']));
			}
			$this->bd->update('users',$this->chengeData, $_COOKIE['email'], 'email');
		}
		public function Logout()
		 {
		 	setcookie('user', null, time()-60*60*24*30*12);
		 }

		 public function CheckCookie()
		 {
		 	if($this->bd->selectOne('users', htmlspecialchars($_COOKIE['user']) , 'hash'))
		 	{
		 		return true;
		 	}
		 	else 
		 	{
		 		return false;
		 	}
		 } 

		 public function confirmEmail()
		 {
		 	$input = htmlspecialchars(trim($_POST['email']));
		 	if($this->user = $this->bd->selectOne('users', $input, 'email'))
		 	{	
		 		$pass = htmlspecialchars($_POST['pass']);
		 		foreach ($this->user as $key => $value) {
		 			$this->user = $value;
		 			
		 		}
		 		//print_r($user);
		 		if(password_verify($pass, $this->user['pass']))
		 		{	
		 			$this->email = $this->user['email'];
		 			return true;
		 			
		 		}
		 		else
		 		{
		 			$this->error['error_pass'] = 'Неверный пароль';
		 			return false;
		 		}

		 	}
		 	else
		 	{
		 		$this->error['error_email'] = 'Неверный email';
		 		return false;
		 	}
		 }

		 public function Auth()
		 {
		 	setcookie('user', $this->user['hash'], time()+60*60*24*30*12);
		 }
		 public function generateHash($length)
		{	$code= '';
			$string='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$clen = strlen($string) - 1;   
    			for($i=0; $i < $length; $i++) { 
        		$code = $code.$string[mt_rand(0,$clen)];
                }
                return $code;
		}

		public function CheckDataUser($input)
		{		
			foreach ($input as $key => $value) {
					$this->user[$key] = $value;
				}	
			include 'modell_validation.php';
			$validation = new validation($this->user);
			$validation->corectName(); 
			$validation->CheckSurname();
			$validation->checkPass();
			$validation->confirmPass();
			$validation->checkMarks();
			$validation->checkEmail();
			$validation->checkDate();

			if( $validation->have_error == false){
				unset($this->user['repass']);
					$this->user['age'] = $this->calculate_age($this->user['birth']);
					$this->HashPass();
					$this->user['hash'] = $this->generateHash(12);
					$this->InsertInBD();
					$this->Auth();
					echo json_encode($redirect['redirect']= true);
					die();
				}
				else
				{
					$validation->writeError();
				
				}
		}

		public function HashPass()
		{
			return $this->user['pass'] = password_hash($this->user['pass'], PASSWORD_DEFAULT);
		}
		public function InsertInBD()
		{
			return $this->bd->insert('users', $this->user);
		}
		function calculate_age($birthday) 
		{
			  $birthday_timestamp = strtotime($birthday);
			  $age = date('Y') - date('Y', $birthday_timestamp);
			  if (date('md', $birthday_timestamp) > date('md')) 
			  {
			    $age--;
			  }
			  return $age;
		}
	}