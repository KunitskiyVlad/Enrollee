<?php
	spl_autoload_register(function($class){
    $file = $class.'.php';
    $directory = substr($class, 0, strripos($class, '_'));
    if($directory == 'modell')
    {
    	if(file_exists('./'.$directory.'/'.$file))
    	{
    		require_once './'.$directory.'/'.$file;
    	}
    	else
    	{
    		require $file;
    	}

    }
    //$file =  AP_SITE.$filename;
    if (file_exists($directory.'/'.$file)) require_once __DIR__.'/'.$directory.'/'.$file;
});
