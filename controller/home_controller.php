<?php
	class home_controller extends controller
	{
		public function action_index()
		{

			$this->view->generate('home.php','template.php');
		}
	}