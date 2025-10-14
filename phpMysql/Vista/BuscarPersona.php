<?php
$pageTitle = 'Buscar Persona';
include __DIR__ . '/estructura/header.php';
?>

    <h1 class="mb-4">Buscar Persona por DNI</h1>
    <div class="row">
      <div class="col-lg-6">
        <form class="needs-validation" novalidate action="accion/formAccion.php" method="get" id="formBuscarPersona">
          <input type="hidden" name="op" value="buscarPersona">
          <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required maxlength="10" pattern="^[0-9]{7,10}$" placeholder="Solo números">
            <div class="invalid-feedback">Ingresá un DNI válido (7 a 10 dígitos).</div>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
      </div>
    </div>
    </main>

    <script>
    (function(){
      'use strict';
      const form = document.getElementById('formBuscarPersona');
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
      })();
  </script>
<?php include __DIR__ . '/estructura/footer.php'; ?>


