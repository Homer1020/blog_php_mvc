<?php

namespace Homer\CitasMvc\Models;

use Homer\CitasMvc\Lib\Database;

class User extends Database
{
	public function create($attrs) {
		$query = $this->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
		$query->execute(
			[
				':username' => $attrs['username'],
				':email' => $attrs['email'],
				':password' => $attrs['password'],
			]
		);

		return [
			'username' => $attrs['username'],
			'email' => $attrs['email'],
			'password' => $attrs['password'],
			'id' => $this->pdo->lastInsertId()
		];
	}

	public function findByEmail($email) {
		$query = $this->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');

		$query->execute([
			':email' => $email
		]);

		return $query->fetch(\PDO::FETCH_ASSOC);
	}
}