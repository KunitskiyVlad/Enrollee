<?php


	class controller_registration extends controller
	{
		public function action_index()
		{
			//include'./modell/modell_user.php';
			if(!empty($_COOKIE['user']))
			{
				header('Location:/');
			}
			if($_POST){
				$user['name'] = (string)htmlspecialchars(trim($_POST['name']));
				$user['surname'] = (string)htmlspecialchars(trim($_POST['surname']));
				$user['pass'] = (string)htmlspecialchars(trim($_POST['pass']));
				$user['repass'] = (string)htmlspecialchars(trim($_POST['repass']));
				$user['mark'] = (int)htmlspecialchars(trim($_POST['mark']));
				$user['birth'] = (string)htmlspecialchars(trim($_POST['birth']));
				$user['sex'] = (string)htmlspecialchars(trim($_POST['sex']));
				$user['email'] = (string)htmlspecialchars(trim($_POST['email']));
				$registration = new modell_user;
				$registration->CheckDataUser($user);	
				
			}
			$this->view->generate('registration','registration_template');
		}

		/*public function test()
		{ 
				$array= explode('-', $user['birth']);
				var_dump(checkdate($array[1],$array[2], $array['0']));
				//$date = DateTime::createFromFormat('Y-m-d', $user['birth']);
				//if($date)
					//var_dump($date);
				//else
					//echo 'false';
				$validation = new validation($user);
				//var_dump($validation->data == false);
				$validation->corectName(); 
				 $validation->CheckSurname();
				  $validation->checkPass();
				   $validation->confirmPass();
				    $validation->checkMarks();
				    
				
				
		}	*/
		}
	