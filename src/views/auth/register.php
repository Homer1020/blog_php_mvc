<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Registro - BLOG</title>
  <link href="/assets/sbadmin/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Crear Cuenta</h3>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="form-floating mb-3">
                      <input name="username" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                      <label for="inputFirstName">Nombre de usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                      <label for="inputEmail">Correo electronico</label>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Contraseña" />
                          <label for="inputPassword">Contraseña</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" name="repeat_password" id="inputPasswordConfirm" type="password" placeholder="Confirmar contraseña" />
                          <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 mb-0">
                      <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Crear Cuenta</button></div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small mb-2"><a href="/login">Ya tengo una cuenta</a></div>
                  <div class="small"><a href="/">Volver al Home</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/assets/sbadmin/js/scripts.js"></script>

  <?php if(isset($_SESSION['flash_message'])): ?>
    <script>
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons.fire({
        title: '<?= $_SESSION['flash_message']['type'] === 'error' ? 'Error!' : 'Éxito!' ?>',
        text: '<?= $_SESSION['flash_message']['message'] ?>',
        icon: '<?= $_SESSION['flash_message']['type'] ?>'
      })
    </script>
  <?php endif;?>
</body>

</html>