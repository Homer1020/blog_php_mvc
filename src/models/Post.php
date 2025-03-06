<?php

namespace Homer\CitasMvc\Models;

use Homer\CitasMvc\Lib\Database;

class Post extends Database
{
	public function create($attrs) {
		$connection = $this->connect();

		$query = $connection->prepare("INSERT INTO posts (title, content, category_id, thumbnail, slug) VALUES (:title, :content, :category_id, :thumbnail, :slug)");

		$query->execute([
			'title' => $attrs['title'],
			'content' => $attrs['content'],
			'category_id' => $attrs['category_id'],
			'thumbnail' => $attrs['thumbnail'],
			'slug' => $attrs['slug'],
		]);

		return $connection->lastInsertId();
	}

	public function updateById($id, $attrs) {
		$query = $this->prepare('UPDATE posts SET title = :title, content = :content, category_id = :category_id, thumbnail = :thumbnail, slug = :slug  WHERE id = :id');

		$query->execute([
			':id' => $id,
			':title'	=> $attrs['title'],
			':content'	=> $attrs['content'],
			':category_id'	=> $attrs['category_id'],
			':thumbnail'	=> $attrs['thumbnail'],
			':slug'	=> $attrs['slug'],
		]);

		return $query->rowCount();
	}

	public function deleteById($id) {
		$query = $this->prepare('DELETE FROM posts WHERE id = :id');

		$query->execute([
			':id' => $id
		]);

		return $query->rowCount();
	}

	public function findById($id) {
		$query = $this->prepare('SELECT * FROM posts WHERE id = :id');

		$query->execute([
			':id' => $id
		]);

		return $query->fetchAll(\PDO::FETCH_OBJ)[0];
	}

	public function findBySlug($slug) {
		$query = $this->prepare('SELECT * FROM posts WHERE slug = :slug');

		$query->execute([
			':slug' => $slug
		]);

		return $query->fetchAll(\PDO::FETCH_OBJ)[0];
	}

  public function getAll() {
		$query = $this->query("SELECT posts.*, categories.name as category FROM posts LEFT JOIN categories ON categories.id = posts.category_id ORDER BY created_at DESC");
		return $this->getArray($query, \PDO::FETCH_OBJ);
	}
}