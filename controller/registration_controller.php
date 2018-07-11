<?php
	class registration_controller extends controller
	{
		public function action_index()
		{

			$this->view->generate('registration.php','registration_template.php');
		}
	}