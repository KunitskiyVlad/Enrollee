<?php
	
	/**
	* 
	*/
	namespace App\Modell;
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
				if($page < 1)
				{
					$page = 1;
				}
				if($page > $allPage)
				{
					$page = $allPage;
				}
				$this->buttons['current_page'] = $page;
				
				$page = $page-1;

			} else
			{
			$page = 0;
			$this->buttons['current_page'] = 1;
			}
			if($allPage > 2)
			{
				
				for ($i=$this->buttons['first_page']; $i <$allPage ; $i++) { 
					if($this->buttons['current_page'] == $i)
					{
						continue;
					}
					$this->buttons[$i] = $i;
					
				}
			}

			array_multisort($this->buttons);
		}
		else
		{
			$this->buttons['current_page'] = 1;
		}
			if($this->buttons['current_page'] == $this->buttons['first_page'])
				{
					unset($this->buttons['first_page']);
				}	
				if($this->buttons['current_page'] == $this->buttons['last_page'])
				{
					unset($this->buttons['last_page']);
				}
			unset($this->buttons[0]);	
			$this->active[$this->buttons['current_page']] = 'active';
			$this->pageLimit['start'] = 15*$page;//из это формулы находим с какой записи начинать выводить список
			//$this->data =$this->bd->Sort('users',$field, $order,$start, $needList);
			return $this->pageLimit;
		}
		
	}