
                  
            </div>
        </main>
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
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="/assets/sbadmin/js/scripts.js"></script>
  <script src="/assets/js/scripts.js"></script>
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
