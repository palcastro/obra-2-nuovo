<?php

require '../conexion/conexion.php';
require '../conexion/sesion.php';

//MENÚ E SCRIPT DO TÍTULO QUE TOMA DO HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Cita gardada", $buffer);
echo $buffer;

$data = $_POST['data'];
$nome = $_POST['nome'];
$horain = $_POST['horain'];
$horaout = $_POST['horaout'];

$sql = "INSERT INTO citas (data, nome, horain, horaout) VALUES ('$data','$nome','$horain','$horaout')";
$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<body>

  <div class="container">
    <div class="row">
      <div class="row" style="text-align:center">
        <?php if ($resultado) { ?>
          <h3>CITA GARDADA</h3>
        <?php } else { ?>
          <h3>ERRO AO GARDAR</h3>
        <?php } ?>

        <a href="../index.php" class="btn btn-primary">VOLVER</a>

      </div>
    </div>
  </div>

</body>

</html>
