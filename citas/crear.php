<!-- NOTA: NON BORRAMOS O DE CREAR EN CASO DE NECESITAR A INFORMACIÓN QUE VEN
PARA QUE SE PODAN ENVIAR OS DATOS NO FUTURO A BBDD -->


<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';
?>

<!DOCTYPE html>
<html>
<body>

<?php

// TÍTULO SCRIPT QUE TOMA DE HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Nova cita", $buffer);
echo $buffer;

?>


<!-- MAIN -->
<div class="container">
  <h3 style="text-align: center;">ENGADIR CITA</h3>
  <form class="form-horizontal" action="guardar.php" method="post">
    <div class="form-group">
      <label class="required">Data</label>
      <div class="col-sm-10">
        <input class="form-control date-input" type="date" name="data" id="data" data-trigger="hover" data-toggle="popover">
      </div>
    </div>
    <div class="form-group">
      <label class="required">Nome</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="nome" id="nome">
      </div>
    </div>
    <div class="form-group">
      <label class="required">Hora de comezo</label>
      <div class="col-sm-10">
        <input class="form-control time-input" type="text" name="horain" id="horain">
      </div>
    </div>
    <div class="form-group">
      <label class="required">Hora de saída</label>
      <div class="col-sm-10">
        <input class="form-control time-input" type="text" name="horaout" id="horaout">
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <div style="margin-left:4%" class="col-sm-10">
        <a href="./index.php" class="btn btn-default">Volver</a>
        <button type="submit" class="btn btn-primary">Gardar</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
