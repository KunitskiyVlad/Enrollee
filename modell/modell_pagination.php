<?php
	
	/**
	* 
	*/
	class modell_pagination extends modell
	{
		public $buttons = array();
		public $data = array();
		public $pageLimit = array();
		public function __construct()
		{
			parent::__construct();
		}

		public function ShowData($SelectSort)
		{
			extract($SelectSort);
			$count = $this->bd->Count('users');
			$this->pageLimit['needList'] = 15;//кол-во записей которое выводим
			$allPage = ceil($count/$this->pageLimit['needList']);//сколько будет страниц, всегда округляя в большую сторону
			//echo $allPage;
			
			
			if($allPage > 1){
				
				$this->buttons['last_page'] = $allPage;
				$this->buttons['first_page'] = 1;

			if(isset($_GET['page']))
			{
				$page = (int)$_GET['page'];
				$this->buttons['current_page'] = $page;
				$page = $page-1;

			} else
			{
			$page = 0;
			$this->buttons['current_page'] = 1;
			}
			if( ($allPage -$this->buttons['current_page']) > 2 and ($this->buttons['current_page']-2) >= 1)
			{	
				$this->buttons['previous_page'] = $this->buttons['current_page'] -1;
				$this->buttons['previous_page_previous_page'] = $this->buttons['previous_page'] -1;
				$this->buttons['current_page'] = $this->buttons['current_page'];
				$this->buttons['next_page'] = $this->buttons['current_page'] +1;
				$this->buttons['next_next_page'] = $this->buttons['next_page'] +1;
			}
			if( ($allPage -$this->buttons['current_page']) > 2)
			{
				$this->buttons['next_page'] = $this->buttons['current_page'] +1;
				$this->buttons['next_next_page'] = $this->buttons['next_page'] +1;
			}
			if( ($allPage -$this->buttons['current_page']) == 1)
			{
				$this->buttons['next_page'] = $this->buttons['current_page'] +1;
				unset($this->buttons['next_next_page']);
				unset($this->buttons['last_page']);
			}
			if(($allPage -$this->buttons['current_page']) <=  2)
			{	
				
				$this->buttons['previous_page'] = $this->buttons['current_page'] -1;
				$this->buttons['previous_page_previous_page'] = $this->buttons['previous_page'] -1;
				$this->buttons['current_page'] = $this->buttons['current_page'];
				$this->buttons['next_page'] =$this->buttons['current_page'] +1;
			}
			if(($allPage -$this->buttons['current_page']) ==  0)
			{
				unset($this->buttons['last_page']);
				unset($this->buttons['next_page']);
				unset($this->buttons['next_next_page']);
			}

			if($this->buttons['current_page']-2 == 0)
			{
				
				unset($this->buttons['previous_page']);
				unset($this->buttons['previous_page_previous_page']);
			}
			if(($this->buttons['current_page']-2) ==  1)
			{
				unset($this->buttons['first_page']);
			}
			if(($this->buttons['current_page']-2) <  0)
			{
				unset($this->buttons['first_page']);
				unset($this->buttons['previous_page']);
				unset($this->buttons['previous_page_previous_page']);
			}

			array_multisort($this->buttons);
		}
		else
		{
			$this->buttons['current_page'] = 1;
		}
			$this->pageLimit['start'] = 15*$page;//из это формулы находим с какой записи начинать выводить список
			//$this->data =$this->bd->Sort('users',$field, $order,$start, $needList);
			return $this->pageLimit;
		}
		
	}