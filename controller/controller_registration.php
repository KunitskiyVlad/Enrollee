<?php


	class controller_registration extends controller
	{
		public function action_index()
		{
			
			
			if($_POST){
				include'./modell/registration_modell.php';
				$registration = new registration;
				$registration->CheckDataUser();	
				
			}
			$this->view->generate('registration.php','registration_template.php');
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
	