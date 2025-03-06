<?php

namespace Homer\CitasMvc\Models;

use Homer\CitasMvc\Lib\Database;

class Category extends Database
{
	public function create($attrs) {
		$connection = $this->connect();

		$query = $connection->prepare("INSERT INTO categories (name) VALUES (:name)");

		$query->execute([
			'name' => $attrs['name']
		]);

		return $connection->lastInsertId();
	}

	public function updateById($id, $attrs) {
		$query = $this->prepare('UPDATE categories SET name = :name WHERE id = :id');

		$query->execute([
			':id' => $id,
			':name'	=> $attrs['name']
		]);

		return $query->rowCount();
	}

	public function deleteById($id) {
		$query = $this->prepare('DELETE FROM categories WHERE id = :id');

		$query->execute([
			':id' => $id
		]);

		return $query->rowCount();
	}

	public function findById($id) {
		$query = $this->prepare('SELECT * FROM categories WHERE id = :id');

		$query->execute([
			':id' => $id
		]);

		return $query->fetchAll(\PDO::FETCH_OBJ)[0];
	}

  public function getAll() {
		$query = $this->query("SELECT * FROM categories ORDER BY id DESC");
		return $this->getArray($query, \PDO::FETCH_OBJ);
	}
}