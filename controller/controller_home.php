<?php
	

	class controller_home extends controller
	{
		public $params = array();
		public function action_index()
		{	$TemplatePage = 'template';
			if(isset($_COOKIE['user']))
			{
				
				$user = new modell_user;
				if($user)
				{
				$TemplatePage = 'authUser';
				
				$data['UserData']['name'] = $user->user['name'];
				$data['UserData']['surname'] = $user->user['surname'];
			}
			}
			
			
			$ContentPage ='home';
			
			
			$modell = new modell_list;
			$pagination = new modell_pagination;
			

			
			$data['SelectSort'] = $modell->SelectSort();
			$this->params['field'] = $data['SelectSort']['field'];
			$this->params['order'] = $data['SelectSort']['order'];
			$data['SortButton'] = $modell->SortButton;
			$data['theads'] = $modell->theads;
			$data['pageLimit'] = $pagination->ShowData($data['SelectSort']);
			$this->params['start'] = $data['pageLimit']['start'];
			$this->params['needList'] = $data['pageLimit']['needList'];
			$data['page'] = $pagination->buttons;

			if(isset($_GET['search']))
			{
				
				
				$data['searchResult'] = $modell->search();
				$data['search'] = $modell->search;

				if($data['searchResult'] == true)
				{
				$this->params['like'] = $data['searchResult']['search'];
				$this->params['conditionLike'] = $data['searchResult']['key'];
				}
			}
			else
			{
			$data['search'] = $modell->search;
			
			}
			$data['users'] = $modell->ShowTable($this->params);
			if(isset($_GET['search']) && $data['searchResult'] == true)
			{	
				$data['users'] = $modell->MarkerSearch($data['users']);

			}
			if(isset($_POST['logout']))
			{	
				
				$user->Logout();
			}
			
			$data['error_search'] = $modell->error;
			$this->view->generate($ContentPage,$TemplatePage, $data);
		}
	}