<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// MENÚ E ESCRIPT QUE TOMA DO HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Axenda", $buffer);
echo $buffer;

?>

<!DOCTYPE html>
<html>

<body>
  <!--MENÚ-MAIN-->

  <div class="master-container my-4">

    <div class="container">
      <h3 class="text-primary w-25 p-2 mb-4 "><b>AXENDA</b></h3>
      <div class="table-responsive d-flex justify-content-center">
        <?php
        $sql = "SELECT * FROM citas";
        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
          echo "<table class='table table-striped table-hover'><tr class='table-primary'><th>Resolto</th><th>Data</th><th>Nome</th><th>Hora de comezo</th><th>Hora de saída</th></tr>";
          while ($row = $resultado->fetch_assoc()) {
            echo "<tr><td><input type='checkbox'></form><td>" . $row["data"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["horain"] . "</td><td>" . $row["horaout"] . "</td></tr>";
          }
          echo "</table>";
        } else {
          echo "0 resultados";
        }

        $mysqli->close();
        ?>
      </div>

      <!-- MODAL POSIBLE INTENTO -->
      <div class="row d-flex justify-content-end mt-2">
        <button type="button" class="btn btn-primary mb-4 w-25" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nova cita</button>
      </div>


      <!-- FORMULARIO MODAL -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Engadir Cita</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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


              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn " data-bs-dismiss="modal">Pechar</button>
              <button type="button" href="/citas/guardar.php" class="btn btn-primary">Gardar</button>
            </div>
          </div>
        </div>
      </div>





    </div>

  </div>
  <!--COMPOÑENTE FOOTER -->
  <?php
  include_once '../inc/footer.php';
  ?>
</body>



</html>
