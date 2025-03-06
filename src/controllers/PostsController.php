<?php

namespace Homer\CitasMvc\Controllers;
use Homer\CitasMvc\Lib\Controller;
use Homer\CitasMvc\Models\Category;
use Homer\CitasMvc\Models\Post;

class PostsController extends Controller {
  public function index() {
    $postModel = new Post;

    $posts = $postModel->getAll();

    $this->render('posts/index', compact('posts'));
  }

  public function destroy($id) {
    $postModel = new Post;

    $post = $postModel->findById($id);

    $postModel->deleteById($id);

    $previousThumbnail = base_app . '/src/public/uploads/posts/' . $post->thumbnail;

    if(file_exists($previousThumbnail)) {
      unlink($previousThumbnail);
    }

    $this->flash([
      'type' => 'success',
      'message' => 'Publicación eliminada con éxito.'
    ]);
    redirect('/admin/publicaciones');
  }

  public function create() {
    $categoryModel = new Category;
    $categories = $categoryModel->getAll();
    $this->render('posts/create', compact('categories'));
  }

  public function edit($id) {
    $categoryModel = new Category;
    $categories = $categoryModel->getAll();
    $postModel = new Post;
    $post = $postModel->findById($id);
    $this->render('posts/create', compact('categories', 'post'));
  }

  public function store() {
    $title = $this->post('title');
    $slug = slugify($title);
    $content = $this->post('content');
    $category_id = $this->post('category_id');
    $thumbnail = null;

    if(isset($_FILES['thumbnail'])) {
      $archivo = $_FILES['thumbnail'];
      $tamanoMaximo = 5 * 1024 * 1024; // 5 MB
      $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
  
      if ($archivo['size'] > $tamanoMaximo) {
        $this->flash([
          'type' => 'error',
          'message' => 'El archivo es demasiado grande.'
        ]);
        redirect('/admin/publicaciones/crear');
        return;
      }
  
      if (!in_array($archivo['type'], $tiposPermitidos)) {
        $this->flash([
          'type' => 'error',
          'message' => 'Tipo de archivo no permitido.'
        ]);
        redirect('/admin/publicaciones/crear');
        return;
      }

      $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
      $nombreUnico = uniqid() . '.' . $extension;

      // Mover el archivo
      $directorioDestino = base_app . '/src/public/uploads/posts/';
      if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
      }

      if (move_uploaded_file($archivo['tmp_name'], $directorioDestino . $nombreUnico)) {
        $thumbnail = $nombreUnico;
      }
    }

    if(!$thumbnail) {
      $this->flash([
        'type' => 'error',
        'message' => 'Error al subir el archivo.'
      ]);
      redirect('/admin/publicaciones/crear');
      return;
    }

    if(!$title || !$slug || !$content || !$category_id) {
      $this->flash([
        'type' => 'error',
        'message' => 'Todos los campos son requeridos.'
      ]);
      redirect('/admin/publicaciones/crear');
      return;
    }

    $postModel = new Post;

    $insertedId = $postModel->create([
      'title' => $title,
      'content' => $content,
      'slug' => $slug,
      'category_id' => $category_id,
      'thumbnail' => $thumbnail
    ]);

    if($insertedId) {
      $this->flash([
        'type' => 'success',
        'message' => 'Publicación creada con éxito.'
      ]);
      redirect('/admin/publicaciones');
      return;
    }

    $this->flash([
      'type' => 'error',
      'message' => 'Error al crear la publicación.'
    ]);
    redirect('/admin/publicaciones');
  }

  public function update($id) {
    $title = $this->post('title');
    $slug = slugify($title);
    $content = $this->post('content');
    $category_id = $this->post('category_id');
    
    $postModel = new Post;
    $post = $postModel->findById($id);

    $thumbnail = $post->thumbnail;

    // var_dump(isset($_FILES['thumbnail']));
    // return;

    if($_FILES['thumbnail']['error'] !== UPLOAD_ERR_NO_FILE) {
      $archivo = $_FILES['thumbnail'];
      $tamanoMaximo = 5 * 1024 * 1024; // 5 MB
      $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
  
      if ($archivo['size'] > $tamanoMaximo) {
        $this->flash([
          'type' => 'error',
          'message' => 'El archivo es demasiado grande.'
        ]);
        redirect('/admin/publicaciones/editar/' . $id);
        return;
      }
  
      if (!in_array($archivo['type'], $tiposPermitidos)) {
        $this->flash([
          'type' => 'error',
          'message' => 'Tipo de archivo no permitido.'
        ]);
        redirect('/admin/publicaciones/editar/' . $id);
        return;
      }

      $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
      $nombreUnico = uniqid() . '.' . $extension;

      // Mover el archivo
      $directorioDestino = base_app . '/src/public/uploads/posts/';
      if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
      }

      if (move_uploaded_file($archivo['tmp_name'], $directorioDestino . $nombreUnico)) {
        $thumbnail = $nombreUnico;
      }

      $previousThumbnail = base_app . '/src/public/uploads/posts/' . $post->thumbnail;

      if(file_exists($previousThumbnail)) {
        unlink($previousThumbnail);
      }
    }

    if(!$title || !$slug || !$content || !$category_id) {
      $this->flash([
        'type' => 'error',
        'message' => 'Todos los campos son requeridos.'
      ]);
      redirect('/admin/publicaciones/editar' . $id);
      return;
    }

    $isUpdated = $postModel->updateById($id, [
      'title' => $title,
      'content' => $content,
      'slug' => $slug,
      'category_id' => $category_id,
      'thumbnail' => $thumbnail
    ]);

    if($isUpdated) {
      $this->flash([
        'type' => 'success',
        'message' => 'Publicación editada con éxito.'
      ]);
      redirect('/admin/publicaciones');
      return;
    }

    $this->flash([
      'type' => 'error',
      'message' => 'Error al editar la publicación.'
    ]);
    redirect('/admin/publicaciones');
  }
}