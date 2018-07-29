<?php 
	
	/**
	* 
	*/
	class modell_list extends modell
	{	
		public $result;
		public $SortButton = array();
		public $SelectSort = array
			(
				'field' => 'mark',
				'order' => 'DESC'
			);
		public $search = null;
		public $theads = array(
    		
		    'name' =>  'Имя',
		    'surname' =>  'Фамилия',
		    'mark' =>  'Оценка',
		    'age' =>  'Возраст',
		);
		public $searchResult = null;

		public function SelectSort()
		{	
			
			if(isset($_GET['sortby']) && isset($_GET['order']))
			{
				$this->SelectSort['field'] =$_GET['sortby'];
				$this->SelectSort['order'] = $_GET['order'];
			}
			$i = 0;
			foreach ($this->theads as $k => $thead)
		{
    		if ($k == $this->SelectSort['field']) 
    		{
		        $img = $this->SelectSort['order'] == 'desc' ? 'fas fa-caret-down' : 'fas fa-caret-up';
		        $soort = ($this->SelectSort['order'] == 'desc' ? 'asc' : 'desc');
		    } 
		    else 
		    {
		        $img = 'fas fa-sort';
		        $soort = 'asc';
		    }
				$i++;
		    	$this->SortButton[$k] = array( 
		    		$k =>array(
		    		'sort'=>$soort,
		    	    'image' =>$img)
		    	    );
		}
			return $this-> SelectSort;
		}

		public function search()
		{
			$search = mb_strtolower($_GET['search']);
			$this->search = '&search='.$_GET['search'];
			$array = $this->bd->select('users');
			$i=0;
			foreach ($array as  $value) 
			{
				foreach ($value as $key => $mass) {
				if (preg_match("/$search/", mb_strtolower($value[$key])))
				{	$marker = '<span style="background-color: #17d657">'.$search.'</span>';
					$i++;
					return $this->searchResult = array(
						'key' =>$key,
						'search' =>$search
						);
					//$string = str_replace($search, $marker, mb_strtolower($value[$key]));
					//$string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
					//$value[$key] = $string;
					//$this->result[$i] = $value;
				}
				
			}
		}
			
	}

	public function MarkerSearch($user)
	{
		$i = 0;
		$search = $this->searchResult['search'];
		foreach ($user as  $value) 
			{
				foreach ($value as $key => $mass) {
					//print_r($value[$key]);
					//echo $value[$key];
				if (preg_match("/$search/", mb_strtolower($value[$key])))
				{	$marker = '<span style="background-color: #17d657">'.$search.'</span>';
					$i++;
					$string = str_replace($search, $marker, mb_strtolower($value[$key]));
					
					$value[$key] = $string;
					//print_r($value);
					$this->result[$i] = $value;
					
				}
				
			}
		}
		return $this->result;
	}
		public function ShowTable($params)
		{	extract($params);
			if($this->searchResult != null)
			{
			
			return $this->bd->Sort('users',$field, $order,$start, $needList, $like, $conditionLike);
			}
			else
			{
				return $this->bd->Sort('users',$field, $order, $start,$needList);
			}
		}
}