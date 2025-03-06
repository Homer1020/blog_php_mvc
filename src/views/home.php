<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOG MVC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">BLOG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        </ul>

        <a class="btn btn-outline-success" href="/login">Iniciar Sesion</a>
      </div>
    </div>
  </nav>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <!-- Título modificado -->
        <h1 class="fw-light">BLOG MVC por Juan</h1>
        <!-- Descripción sobre el patrón MVC -->
        <p class="lead text-muted">
          El patrón MVC (Modelo-Vista-Controlador) es una arquitectura de software que separa la lógica de negocio (Modelo), la interfaz de usuario (Vista) y la lógica de control (Controlador). Este enfoque facilita el mantenimiento, la escalabilidad y la organización del código en aplicaciones web.
        </p>
        <!-- Botones modificados -->
        <?php if(!isset($_SESSION['userdata'])): ?>
          <p>
            <a href="/login" class="btn btn-primary my-2">Iniciar Sesión</a>
            <a href="/registro" class="btn btn-secondary my-2">Registrarse</a>
          </p>
        <?php else: ?>
          <p>
            <a href="/admin/publicaciones" class="btn btn-primary my-2">Gestionar Publicaciones</a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($data['posts'] as $post): ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="/uploads/posts/<?= $post->thumbnail ?>" alt="" class="card-img-top">

              <div class="card-body">
                <p class="card-title h5 mb-3"><?= $post->title ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="/blog/<?= $post->slug ?>" class="btn btn-sm btn-outline-secondary">View</a>
                    <?php if(isset($_SESSION['userdata'])): ?>
                      <a href="/admin/publicaciones/editar/<?= $post->id ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <?php endif; ?>
                  </div>
                  <small class="text-muted">
                    <?php
                      // Crear un objeto DateTime
                      $fecha = new \DateTime($post->created_at);

                      // Formatear la fecha en dd-mm-yyyy
                      echo $fecha->format('d-m-Y');
                    ?>
                  </small>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
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

</html>