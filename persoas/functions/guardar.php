<?php

require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$nome = $_POST['nome'];
$primeiro_apelido = $_POST['primeiro_apelido'];
$segundo_apelido = $_POST['segundo_apelido'];
$nif = $_POST['nif'];
$data_nacemento = $_POST['data_nacemento'];
$sexo = $_POST['sexo'];
$codigo_postal = $_POST['codigo_postal'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$sql = "INSERT INTO persoas (nome, primeiro_apelido, segundo_apelido, nif, data_nacemento, sexo, codigo_postal, telefono, email) VALUES ('$nome', '$primeiro_apelido', '$segundo_apelido', '$nif', '$data_nacemento', '$sexo', '$codigo_postal', '$telefono', '$email')";
$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Rexistro gardado</title>
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
          <h3 style="text-align: center;" class="modal-title"> REXISTRO GARDADO</h3>
          <div class="d-flex justify-content-center mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
              <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
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
