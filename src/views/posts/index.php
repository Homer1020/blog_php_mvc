<?php include base_app . '/src/views/includes/header.php' ?>
<h1 class="mt-4">Publicaciones</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Publicaciones</li>
</ol>

<div class="mb-3 text-end">
  <a href="/admin/publicaciones/crear" class="btn btn-primary">Crear Publicación</a>
</div>


<div class="card">
  <div class="card-header">
    <p class="card-title">Listado de Publicaciones</p>
  </div>
  <div class="card-body">
    <table id="postsTable" class="table table-bordered">
      <thead>
        <tr>
          <th>Miniatura</th>
          <th>Título</th>
          <th>URL</th>
          <th>Categoría</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['posts'] as $post): ?>
          <tr>
            <td>
              <img src="/uploads/posts/<?= $post->thumbnail ?>" alt="<?= $post->title ?>" width="100">
            </td>
            <td><?= $post->title ?></td>
            <td>
              <a href="<?= base_url . 'blog/' . $post->slug ?>"><?= base_url . 'blog/' . $post->slug ?></a>
            </td>
            <td><?= $post->category ?></td>
            <td>
              <a href="/admin/publicaciones/editar/<?= $post->id ?>" class="btn btn-warning">Editar</a>

              <form action="/admin/publicaciones/eliminar/<?= $post->id ?>" method="POST" class="d-inline-block">
                <button class="btn btn-danger" type="submit">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include base_app . '/src/views/includes/footer.php' ?>