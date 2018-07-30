<?php
	
	class controller_cabinet extends controller
		{
			public function action_index()
			{
				//include './modell/modell_user.php';
				$user = new modell_user;
				

				if(empty($_COOKIE['user']) or !$user)
				{
					header('Location:/registration');
					
				}
				if($_POST)
				{	foreach ($_POST as $key => $value) 
					{

					$input[$key] = $value;

					}
				
				$validation = new modell_validation($input);
			
				if(isset($_POST['name']))
				{
					$validation->corectName();
					
				}
				if(isset($_POST['surname']))
				{
					$validation->CheckSurname();
					
				}
				if(isset($_POST['mark']))
				{
					$validation->checkMarks();
					
				}
				if(isset($_POST['birth']))
				{
					$validation->checkDate();
					
				}
					if($validation->have_error)
					{
						$validation->writeError();
					}
					else
					{
					$result = $user->changeUser();
					if(empty($result))
					{
						echo json_encode(true);
						die();
						
					}
					else
					{
						echo json_encode(false);
						die();
					}

				}

				}
			$this->view->generate('cabinet','registration_template', $user->user);
		}
		}