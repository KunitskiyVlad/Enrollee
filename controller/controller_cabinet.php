<?php
	
	class controller_cabinet extends controller
		{
			public function action_index()
			{
				if(!$_COOKIE['email'])
					header('Location:/registration');
				include './modell/modell_user.php';
				$user = new user;
				//print_r($user->userData);
				If($_POST){
					$user->changeUser();
				}
			$this->view->generate('cabinet.php','template.php', $user->userData);
		}
		}