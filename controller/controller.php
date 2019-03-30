<?php
namespace App\Controller;
use App\Http\Request;
use App\View\view;

	abstract class controller
		{

			public $view;

			function __construct()
			{
				$this->view = new view;
			}
			public function index()
			{
				
			}

			public function show(){

            }

            public function create(Request $request)
            {

            }
            public function delete(Request $request)
            {

            }

            public function store(Request $request)
            {

            }
		}	
