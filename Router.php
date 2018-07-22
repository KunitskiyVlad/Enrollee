<?php

	class Router {
		public static function start()
		{
			$controller ='home';
			$action = 'index';
			$url = explode('/',$_SERVER['REQUEST_URI']);
			
			if(!empty($url[1]))
			
			{
				$controller = $url[1];
			}
			
			if(!empty($url[2]))
			
			{
				$action = $url[2];
			}
			
			$controller_class = mb_strtolower('controller_'.$controller);
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