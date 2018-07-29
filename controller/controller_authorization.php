<?php
	
	class controller_authorization extends controller
	{
		public function action_index()
		{	
			include './modell/modell_user.php';
			if(isset($_POST['email']) && isset($_POST['pass']))
			{
				$authorization = new user;
				$authorization->confirmEmail();
				if($authorization->confirmEmail() == false)
				{
					$errors = $authorization->error;
					echo json_encode($errors);
					die();
				}
				else
				{
					$redirect = $authorization->confirmEmail();
					$authorization->Auth();
					echo json_encode($redirect);
					die();
				}
			}
		} 
	}