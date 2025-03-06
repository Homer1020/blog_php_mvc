<?php include base_app . '/src/views/includes/header.php' ?>
<h1 class="mt-4">Categorías</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Categorías</li>
</ol>

<div class="mb-3 text-end">
  <a href="/admin/categorias/crear" class="btn btn-primary">Crear Categoría</a>
</div>

<div class="card">
  <div class="card-header">
    <p class="card-title">Listado de Categorías</p>
  </div>
  <div class="card-body">
    <table id="categoriesTable" class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['categories'] as $category): ?>
          <tr>
            <td><?= $category->name ?></td>
            <td>
              <a href="/admin/categorias/editar/<?= $category->id ?>" class="btn btn-warning">Editar</a>
              <form action="/admin/categorias/eliminar/<?= $category->id ?>" method="POST" class="d-inline-block">
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include base_app . '/src/views/includes/footer.php' ?>