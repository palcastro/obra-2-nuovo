<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// MENÚ E SCRIPT QUE TOMA DO HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Empresas", $buffer);
echo $buffer;

$where = "";

if (!empty($_POST)) {
  $valor = $_POST['campo'];
  if (!empty($valor)) {
    $where = "WHERE nome LIKE '%" . $valor . "%'";
  }
}
$sql = "SELECT * FROM empresas $where";
$resultado = $mysqli->query($sql);

$total_pages = $mysqli->query('SELECT COUNT(*) FROM empresas')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM empresas ORDER BY id LIMIT ?,?')) {
  // Calculate the page to get the results we need from our table.
  $calc_page = ($page - 1) * $num_results_on_page;
  $stmt->bind_param('ii', $calc_page, $num_results_on_page);
  $stmt->execute();
  // Get the results...
  $result = $stmt->get_result();
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>

  <!--  ENCABEZADO: TÍTULO E CADRO DE BÚSQUEDA -->
  <div class="container mb-4">
    <nav class="navbar navbar-light my-4">
      <div class="container-fluid">
      <h3 class="text-primary w-25"><b>EMPRESAS</b></h3>


        <form class="d-flex" action="./busqueda.php" method="POST">
          <!-- BOTÓN ENGADIR NOVO -->
          <div class="mr-4"> <a href="nuevo.php" class="btn btn-white mb-3" alt="Engadir nova empresa">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></a>
          </div>
          <!-- BUSCADOR E BOTÓN BUSCAR -->
          <div class="input-group mb-3 mx-2 w-6" alt="Búsqueda de empresas">
            <input id="campo" name="campo" class="form-control" type="text" placeholder="Búsqueda" aria-label="Search">
            <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-primary text-white rounded-0">
          </div>
        </form>
      </div>
    </nav>

    <!-- TÁBOA -->
    <div id="tabla" class="row table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr class="table-primary">
            <th>Nome</th>
            <th>Poboación</th>
            <th>Actividade</th>
            <th>Data de incorporación</th>
            <th>Teléfono</th>
            <th>Fax</th>
            <th>Accións</th>
          </tr>
        </thead>

        <tbody>
           <!--MÉTODO PARA NOVA PAXINACIÓN -->
      <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['poboacion']; ?></td>
              <td><?php echo $row['actividade']; ?></td>
              <td><?php echo $row['data_incorporacion']; ?></td>
              <td></td>
              <td></td>
              <!-- <td><?php echo $row['ofertas_contratacion']; ?></td> -->
              <!-- <td><?php echo $row['ofertas_formacion']; ?></td> -->
              <!-- Iconos acciones -->
              <td class="d-flex"><a href="ver_ficha.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye " viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                  </svg></a>
                <a href="modificar.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" alt="Modificar rexistro" width="16" height="16" fill="currentColor" class="bi bi-pencil mx-2" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                  </svg></a>
                <a href="functions/eliminar.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" alt="Eliminar rexistro" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg></a>
              </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
      </table>
    </div>
<!-- FUNCIÓN DE PAXINACIÓN (SEN ESTILOS) -->
<?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
    <ul class="pagination">
      <?php if ($page > 1) : ?>
        <li class="prev"><a href="index.php?page=<?php echo $page - 1 ?>">Anterior</a></li>
      <?php endif; ?>

      <?php if ($page > 3) : ?>
        <li class="start"><a href="index.php?page=1">1</a></li>
        <li class="dots">...</li>
      <?php endif; ?>

      <?php if ($page - 2 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
      <?php if ($page - 1 > 0) : ?><li class="page"><a href="index.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

      <li class="currentpage"><a href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

      <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
      <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="index.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

      <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
        <li class="dots">...</li>
        <li class="end"><a href="index.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
      <?php endif; ?>

      <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
        <li class="next"><a href="index.php?page=<?php echo $page + 1 ?>">Seguinte</a></li>
      <?php endif; ?>
    </ul>
  <?php endif; ?>

</div>

  <!-- COMPOÑENTE FOOTER -->
  <?php
  include_once '../inc/footer.php';
  ?>
</body>
</html>
