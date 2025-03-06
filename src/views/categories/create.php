<?php include base_app . '/src/views/includes/header.php' ?>
<h1 class="mt-4">Categorías</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="/admin/categorias">Categorías</a></li>
  <li class="breadcrumb-item active"><?= isset($data['category']) ? 'Editar' : 'Crear' ?> Categoría</li>
</ol>

<div class="card">
  <div class="card-header">
    <p class="card-title"><?= isset($data['category']) ? 'Editar' : 'Crear' ?> Categorías</p>
  </div>
  <div class="card-body">
    <form method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Nombre *</label>
        <input type="text" value="<?= isset($data['category']) ? $data['category']->name : '' ?>" name="name" id="name" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>

<?php include base_app . '/src/views/includes/footer.php' ?>