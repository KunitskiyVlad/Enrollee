<?php
	
	class controller_cabinet extends controller
		{
			public function action_index()
			{
				include './modell/modell_user.php';
				$user = new user;
				if(empty($_COOKIE['user']) or !$user)
				{
					header('Location:/registration');
					
				}
				if($_POST)
				{
					$user->changeUser();
				}
			$this->view->generate('cabinet','registration_template', $user->user);
		}
		}