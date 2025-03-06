<?php

namespace Homer\CitasMvc\Controllers;

use Homer\CitasMvc\Lib\Controller;
use Homer\CitasMvc\Models\Category;

class CategoriesController extends Controller
{
  public function index() {
    $categoyModel = new Category;
    $categories = $categoyModel->getAll();

    $this->render('categories/index', compact('categories'));
  }

  public function edit($id) {
    $categoryModel = new Category;
    $category = $categoryModel->findById($id);
    $this->render('categories/create', compact('category'));
  }

  public function create() {
    $this->render('categories/create');
  }

  public function update($id) {
    $name = $this->post('name');

    if(!$name) {
      $this->flash([
        'type' => 'error',
        'message' => 'El campo nombre es obligatorio.'
      ]);
      redirect('/admin/categorias/editar/' . $id);
      return;
    }

    $categoryModel = new Category;
    $isUpdated = $categoryModel->updateById($id, compact('name'));

    if(!$isUpdated) {
      $this->flash([
        'type' => 'error',
        'message' => 'Nada para actualizar.'
      ]);
      redirect('/admin/categorias');
      return;
    }

    $this->flash([
      'type' => 'success',
      'message' => 'Categoría actualizada correctamente.'
    ]);
    redirect('/admin/categorias');
  }

  public function store() {
    $name = $this->post('name');

    if(!$name) {
      $this->flash([
        'type' => 'error',
        'message' => 'El campo nombre es obligatorio.'
      ]);
      redirect('/admin/categorias/crear');
      return;
    }

    $categoryModel = new Category;
    $insertedId = $categoryModel->create(compact('name'));

    if(!$insertedId) {
      $this->flash([
        'type' => 'error',
        'message' => 'Nada para actualizar.'
      ]);
      redirect('/admin/categorias');
      return;
    }

    $this->flash([
      'type' => 'success',
      'message' => 'Categoría actualizada correctamente.'
    ]);
    redirect('/admin/categorias');
  }

  public function destroy($id) {
    $categoryModel = new Category;
    $isDeleted = $categoryModel->deleteById($id);

    if(!$isDeleted) {
      $this->flash([
        'type' => 'error',
        'message' => 'No se pudo eliminar.'
      ]);
      redirect('/admin/categorias');
      return;
    }

    $this->flash([
      'type' => 'success',
      'message' => 'Categoría eliminada correctamente.'
    ]);
    redirect('/admin/categorias');
  }
}