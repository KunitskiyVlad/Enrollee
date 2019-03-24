<?php
use App\Controller as controller;
use App\HTTP\Request;
	class Router {
		public static function start(Request $request)
		{

			$controller ='home';
			$action = 'index';
			$url = parse_url($request->getUri());
			//echo($url['path']);
			if(!empty($url['path']) && $url['path'] != '/')

			{
				$controller = str_replace('/', '', $url['path']);
			}
			
			if(!empty($url[2]))
			
			{
				$action = $url[2];
			}
			
			$controller_class = 'App\\Controller\\'.mb_strtolower('controller_'.$controller);
			$action = mb_strtolower('action_'.$action);
			//if(file_exists('controller/'.$controller_class.'.php') )
			//{
				//include 'controller/'.$controller_class.'.php';
				$class = new $controller_class;
				$class->$action();
			//}
			//else 
			//{
				//Router::error();
			//}
		}

		public static function error()
		{
			header('HTTP/1.1 404 Not Found');
			die();
		}
	}