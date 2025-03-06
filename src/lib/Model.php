<?php

namespace Homer\CitasMvc\Lib;

class Model
{

	private Database $db;

	public function __construct()
	{
		$this->db = new Database();
	}
}