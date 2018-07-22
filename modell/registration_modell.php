<?php
	
	class Registration extends modell
	{
		public $user =  array();
		

		public function CheckDataUser()
		{		
				$this->user['name'] = (string)htmlspecialchars(trim($_POST['name']));
				$this->user['surname'] = (string)htmlspecialchars(trim($_POST['surname']));
				$this->user['pass'] = (string)htmlspecialchars(trim($_POST['pass']));
				$this->user['repass'] = (string)htmlspecialchars(trim($_POST['repass']));
				$this->user['mark'] = (int)htmlspecialchars(trim($_POST['mark']));
				$this->user['birth'] = (string)htmlspecialchars(trim($_POST['birth']));
				$this->user['sex'] = (string)htmlspecialchars(trim($_POST['sex']));
				$this->user['email'] = (string)htmlspecialchars(trim($_POST['email']));
				
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
					$this->HashPass();
					$this->InsertInBD();
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
	}