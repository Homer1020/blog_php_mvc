<?php

namespace Homer\CitasMvc\Lib;

use Homer\CitasMvc\Lib\SystemSettings;

class View
{
	public $data;
	public function render(string $nombre, array $data = [])
	{
		global $_settings;
		$this->data = $data;
		require 'src/views/' . $nombre . '.php';
	}
}