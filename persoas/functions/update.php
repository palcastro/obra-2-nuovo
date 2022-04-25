<?php

require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$primeiro_apelido = $_POST['primeiro_apelido'];
$segundo_apelido = $_POST['segundo_apelido'];
$nif = $_POST['nif'];
$data_nacemento = $_POST['data_nacemento'];
$sexo = $_POST['sexo'];
$codigo_postal = $_POST['codigo_postal'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$sql = "UPDATE persoas SET nome='$nome', primeiro_apelido='$primeiro_apelido', segundo_apelido='$segundo_apelido', nif='$nif', data_nacemento='$data_nacemento', sexo='$sexo', codigo_postal='$codigo_postal', telefono='$telefono', email='$email' WHERE id = '$id'";
$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../assets/css/index.css">
  <title>Modificar rexistro</title>
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
          <h3 style="text-align: center;" class="modal-title"> REXISTRO MODIFICADO</h3>
          <div class="d-flex justify-content-center mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
              <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
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
