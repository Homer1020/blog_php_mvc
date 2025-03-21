<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOG MVC | <?= $data['post']->title ?></title>
  <link id="theme-link" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/">BLOG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>

        <a class="btn btn-outline-success me-2" href="/login">Iniciar Sesion</a>
        <button id="toggle-theme" class="btn btn-secondary">Cambiar Tema</button>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="background-image: url(/uploads/posts/<?= $data['post']->thumbnail ?>); background-position: center; background-size: cover;" alt="<?= $data['post']->title ?>">
      <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic"><?= $data['post']->title ?></h1>
      </div>
    </div>
  </div>

  <div class="container">
    <p class="text-muted small mb-1">Categoria: <?= $data['post']->category ?></p>
    <p class="text-muted small">Fecha: <?= $data['post']->created_at ?></p>
    <p><?= $data['post']->content ?></p>
  </div>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Volver</a>
      </p>
      <p class="mb-1">Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

<script src="/assets/js/front.js"></script>

</html>