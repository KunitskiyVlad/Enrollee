<?php
namespace App\View;
	class view
	{
		
		function generate($content, $template, $date = null)
		{
			include $template.'.php';
		}
	}