<?php

namespace Homer\CitasMvc\Lib;

class Controller
{
	private View $view;

	public function __construct()
	{
		$this->view = new View();
	}

	public function render(string $name, array $data = [])
	{
		$this->view->render($name, $data);
		if(isset($_SESSION['flash_message'])) {
			unset($_SESSION['flash_message']);
		}
	}

	public function flash($params) {
		$_SESSION['flash_message'] = $params;
	}

	protected function post(string $param)
	{
		if(!isset($_POST[$param]))
		{
			return NULL;
		}
		return $_POST[$param];
	}

	protected function get(string $param)
	{
		if(!isset($_GET[$param]))
		{
			return NULL;
		}
		return $_GET[$param];
	}
}