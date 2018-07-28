<?php
	

	class controller_home extends controller
	{
		public function action_index()
		{	require_once('./modell/modell_list.php');
			
			$modell = new modell_list;
			require_once('./modell/modell_pagination.php');
			$pagination = new modell_pagination;
			

			
			$data['SelectSort'] = $modell->SelectSort();
			$data['SortButton'] = $modell->SortButton;
			//print_r($data['SelectSort']);
			$data['theads'] = $modell->theads;
			$data['users'] = $pagination->ShowData($data['SelectSort']);
			$data['page'] = $pagination->buttons;
			if(isset($_GET['search']))
			{
				$modell->search();
				
				$data['users'] = $modell->result;

			}
			$data['search'] = $modell->search;
			$this->view->generate('home.php','template.php', $data);
		}
	}