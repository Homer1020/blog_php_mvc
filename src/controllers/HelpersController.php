<?php

namespace Homer\CitasMvc\Controllers;

use Homer\CitasMvc\Lib\Controller;

class HelpersController
{
	public function public($file)
	{
		$path = __DIR__ . "/../public/" . $file;
		if(
			file_exists($path)
			&&
			!is_dir($path)
		)
	  {
	  	$ext = pathinfo($file, PATHINFO_EXTENSION);

	  	// public files supports
	  	$imagesExts = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];
	  	$textExts = ['html', 'css', 'js', 'json'];

	  	// header depending of support
	  	if(in_array($ext, $imagesExts))
	  	{
	  		header('Content-Type: image/' . $ext);
	  	} else if(in_array($ext, $textExts))
	  	{
	  		header('Content-Type: text/' . $ext);
	  	}

	  	// give the file successfully
	  	echo file_get_contents($path);
	  } else {
	    header('HTTP/1.1 404 Not Found');
	  	$controller = new PagesController;
			$controller->error_404();
	  }
	}

	public function uploads($file)
	{
		$path = __DIR__ . "/../uploads" . $file;
		if(
			file_exists($path)
			&&
			!is_dir($path)
		)
	  {
	  	$ext = pathinfo($file, PATHINFO_EXTENSION);

	  	// public files supports
	  	$imagesExts = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];
	  	$textExts = ['html', 'css', 'js', 'json'];

	  	// header depending of support
	  	if(in_array($ext, $imagesExts))
	  	{
	  		header('Content-Type: image/' . $ext);
	  	} else if(in_array($ext, $textExts))
	  	{
	  		header('Content-Type: text/' . $ext);
	  	}

	  	// give the file successfully
	  	echo file_get_contents($path);
	  } else {
	    header('HTTP/1.1 404 Not Found');
	  }
	}
}