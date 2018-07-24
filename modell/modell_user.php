<?php
	
	class user extends modell
	{	public $userData = array();
		public $chengeData = array();
		public function __construct()
		{
			parent::__construct();
			return $this->userData = $this->bd->selectOne('users', $_COOKIE['email'] , 'email');
		}

		public function changeUser()
		{
			if(isset($_POST['name']))
			{
				$this->chengeData['name'] =htmlspecialchars(trim($_POST['name']));
			}
			if(isset($_POST['surname']))
			{
				$this->chengeData['surname'] =htmlspecialchars(trim($_POST['surname']));
			}
			if(isset($_POST['mark']))
			{
				$this->chengeData['mark'] =htmlspecialchars(trim($_POST['mark']));
			}
			$this->bd->update('users',$this->chengeData, $_COOKIE['email'], 'email');
		}
	}