<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// Menú y script title que toma el header.
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Persoas", $buffer);
echo $buffer;


$where = "";

if (!empty($_POST)) {
  $valor = $_POST['campo'];
  if (!empty($valor)) {
    $where = "WHERE nif LIKE '%" . $valor . "%'";
  }
}
// DESACTIVAR PARA EVIAR CONFLICTO CON PAGINACIÓN -> DEJA DE FUNCIONAR LA BÚSQUEDA POR NIF
// $sql = "SELECT * FROM persoas $where";
// $result = $mysqli->query($sql);

// PAGINACION

// Get the total number of records from our table "PERSOAS".
$total_pages = $mysqli->query('SELECT COUNT(*) FROM persoas')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM persoas ORDER BY id LIMIT ?,?')) {
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
<body>

<!-- ENCABEZADO: TÍTULO E CADRO DE BÚSQUEDA -->
<div class="container mb-4">
  <nav class="navbar navbar-light my-4">
    <div class="container-fluid">
    <h3 class="text-primary w-25"><b>PERSOAS</b></h3>

      <form class="d-flex" action="./busqueda.php" method="POST">
        <!-- BOTÓN DE NOVA PERSOA -->
        <div class="mr-4"> <a href="nuevo.php" class="btn btn-white mb-3" alt="Engadir nova persoa">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z">
              </path>
            </svg>
          </a>
        </div>
        <!--BUSCADOR E BOTÓN DE BUSCAR -->
        <div class="input-group mb-3 mx-2 w-6" alt="Búsqueda de personas">
          <input id="campo" name="campo" class="form-control" type="text" placeholder="Búsqueda" aria-label="Search">
          <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-primary text-white rounded-0">
        </div>
      </form>
    </div>
  </nav>

  <!-- TABLA CONTIDOS -->

  <div id="tabla" class="row table-responsive">
    <table class="table table-striped table-hover">
      <thead>
      <tr class="table-primary">
        <th class="text-nowrap">Nome</th>
        <th class="text-nowrap">1º Apelido</th>
        <th class="text-nowrap">2º Apelido</th>
        <th class="text-nowrap">DNI/NIF</th>
        <th class="text-nowrap">Nacemento</th>
        <th class="text-nowrap">Sexo</th>
        <th class="text-nowrap">CP</th>
        <th class="text-nowrap">Teléfono</th>
        <th class="text-nowrap">Correo</th>
        <th class="text-nowrap">Accións</th>
      </tr>
      </thead>

      <tbody>
      <!-- MÉTODO PARA NOVA PAXINACIÓN-->
      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['nome']; ?></td>
          <td><?php echo $row['primeiro_apelido']; ?></td>
          <td><?php echo $row['segundo_apelido']; ?></td>
          <td><?php echo $row['nif']; ?></td>
          <td><?php echo $row['data_nacemento']; ?></td>
          <td><?php echo $row['sexo']; ?></td>
          <td><?php echo $row['codigo_postal']; ?></td>
          <td><?php echo $row['telefono']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <!-- Iconos tabla -->
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
  <!-- FUNCIÓN DE PAXINACIÓN -->
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
