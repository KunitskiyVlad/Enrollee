<?php
	
	class controller_authorization extends controller
	{
		public function action_index()
		{	
			//include './modell/modell_user.php';
			if(isset($_POST['email']) && isset($_POST['pass']))
			{
				$authorization = new modell_user;
				$result = $authorization->confirmEmail();
				if($result == false)
				{
					$errors = $authorization->error;
					echo json_encode($errors);
					die();
				}
				else
				{
					$redirect = $result;
					$authorization->Auth();
					echo json_encode($redirect);
					die();
				}
			}
		} 
	}