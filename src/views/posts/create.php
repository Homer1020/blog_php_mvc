<?php include base_app . '/src/views/includes/header.php' ?>
<h1 class="mt-4">Publicaciones</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="/admin/publicaciones">Publicaciones</a></li>
  <li class="breadcrumb-item active"><?= isset($data['post']) ? 'Editar' : 'Crear' ?> Publicación</li>
</ol>

<div class="card">
  <div class="card-header">
    <p class="card-title"><?= isset($data['post']) ? 'Editar' : 'Crear' ?> Publicaciones</p>
  </div>
  <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Título *</label>
        <input type="text" value="<?= isset($data['post']) ? $data['post']->title : '' ?>" name="title" id="title" class="form-control">
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Contenido *</label>
        <textarea name="content" id="content" rows="5" class="form-control"><?= isset($data['post']) ? $data['post']->title : '' ?></textarea>
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Categoría *</label>
        <select name="category_id" id="category_id" class="form-select">
          <option disabled selected>Seleccionar una Opción</option>
          <?php foreach($data['categories'] as $category): ?>
            <option <?= isset($data['post']) ? ($data['post']->category_id === $category->id ? 'selected' : '') : '' ?> value="<?= $category->id ?>"><?= $category->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="thumbnail" class="form-label">Miniatura *</label>
        <input class="form-control" type="file" name="thumbnail" id="thumbnail">
      </div>

      <?php if(isset($data['post'])): ?>
        <div class="mb-3">
          <img src="/uploads/posts/<?= $data['post']->thumbnail ?>" alt="<?= $data['post']->title ?>" width="240">
        </div>
      <?php endif; ?>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>

<?php include base_app . '/src/views/includes/footer.php' ?>