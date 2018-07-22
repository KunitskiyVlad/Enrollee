<?php
	class modell
	{
		private $query;
		public $bd;

		public function __construct()
		{
			include_once './config/db.php';
			$this->bd = new DBApi();
		}
		public function index()
		{}
	}