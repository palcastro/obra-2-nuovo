<?php

require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$localidade = $_POST['localidade'];
$poboacion = $_POST['poboacion'];
$actividade = $_POST['actividade'];
$telefono = $_POST['telefono'];
$fax = $_POST['fax'];
$data_incorporacion = $_POST['data_incorporacion'];
$persoa_contacto = $_POST['persoa_contacto'];
$orientador = $_POST['orientador'];
$ofertas_contratacion = $_POST['ofertas_contratacion'];
$ofertas_formacion = $_POST['ofertas_formacion'];
$notas = $_POST['notas'];

$sql = "UPDATE empresas SET nome='$nome', localidade='$localidade', poboacion='$poboacion', actividade='$actividade',
telefono='$telefono', fax='$fax', data_incorporacion='$data_incorporacion', persoa_contacto='$persoa_contacto',
orientador='$orientador', ofertas_contratacion='$ofertas_contratacion', ofertas_formacion='$ofertas_formacion',
notas='$notas' WHERE id='$id'";
$resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Modificar rexistro</title>
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
                    <h3 style="text-align: center;" class="modal-title"> REXISTRO MODIFICADO</h3>
                    <div class="d-flex justify-content-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
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
