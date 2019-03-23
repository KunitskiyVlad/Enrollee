<?php
namespace App\Modell;
use App\Config\dbapi;
	class modell
	{
		private $query;
		public $bd;

		public function __construct()
		{
			//include_once './config/dbapi.php';
			$this->bd = new DBApi();
		}
		public function index()
		{}
	}