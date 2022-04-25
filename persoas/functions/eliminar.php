<?php
require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$id = $_GET['id'];

$sql = "DELETE FROM persoas WHERE id = '$id'";
$resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Rexistro eliminado</title>
  <link rel="stylesheet" href="../../assets/css/index.css">
  </head>
<!-- CAIXA MENSAXE -->
<body>
  <div class="modal modal-sheet d-block bg-light d-flex align-items-center" tabindex="-1" role="dialog" id="modalSheet">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-6 shadow">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0 ">
          <h3 style="text-align: center;" class="modal-title"> REXISTRO ELIMINADO</h3>
          <div class="d-flex justify-content-center mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-x " viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
              <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>

        </div>
        <div class="modal-footer flex-column border-top-0">

          <a href="../index.php" class="btn btn-lg btn-secondary w-50 mx-0 mb-5 mt-4">VOLTAR</a>

        </div>
      </div>
    </div>
  </div>


</body>

</html>
