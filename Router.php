<?php
use App\Controller as controller;
	class Router {
		public static function start()
		{

			$controller ='home';
			$action = 'index';
			$url = explode('/',$_SERVER['REQUEST_URI']);
			$url = parse_url($_SERVER['REQUEST_URI']);
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