<?php
	

	class controller_home extends controller
	{
		public function action_index()
		{

			$this->view->generate('home.php','template.php');
		}
	}