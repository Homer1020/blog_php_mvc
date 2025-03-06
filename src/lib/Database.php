<?php

namespace Homer\CitasMvc\Lib;

use PDO;
use PDOException;
use mysqli;

class Database
{
	private string $host;
	private string $db;
	private string $user;
	private string $password;
	private string $charset;
	public $conn;
	public $pdo;

	public function __construct()
	{
		$this->host = $_ENV['DB_HOST'];
		$this->db = $_ENV['DB_NAME'];
		$this->user = $_ENV['DB_USER'];
		$this->charset = $_ENV['DB_CHARSET'];
		$this->password = $_ENV['DB_PASSWORD'];
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
    if (!isset($this->conn)) {
      if (!$this->conn) {
        echo 'Cannot connect to database server';
        exit;
      }            
    }
	}

  public function __destruct(){
    $this->conn->close();
  }

	public function connect(): PDO
	{
		try {
			$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			];
			$pdo = new PDO(
				$connection,
				$this->user,
				$this->password,
				$options
			);
			$this->pdo = $pdo;
			return $pdo;
		} catch(PDOException $err)
		{
			throw $err;
		}
	}

	public function query($query)
	{
		return $this->connect()->query($query);
	}

	public function prepare($query)
	{
		return $this->connect()->prepare($query);
	}

	public function getArray($query, $type)
	{
    $data = [];
    while ($row = $query->fetch($type)) {
    	array_push($data, $row);
    }
    return $data;
	}
}