<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// Menú y script title que toma el header.
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Empresas", $buffer);
echo $buffer;

// MÉTODO DE BÚSQUEDA ANTERIOR- PONSE APARTE PARA QUE FUNCIONE
$where = "";

if (!empty($_POST)) {
    $valor = $_POST['campo'];
    if (!empty($valor)) {
        // $where = "WHERE nome LIKE '%" . $valor . "%'";
        $where = "WHERE nome LIKE '$valor%'";
    }
}
$sql = "SELECT * FROM empresas $where";
$consulta = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
<body>

     <!-- ENCABEZADO:TÍTULO E CADRO DE BÚSQUEDA -->
    <div class="container mb-4">
        <nav class="navbar navbar-light my-4">
            <div class="container-fluid">
                <h2 class="text-primary  w-25">Empresas</h2>

                <form class="d-flex" action="./busqueda.php" method="POST">
                    <!-- Botón añadir nuevo -->
                    <div class="mr-4"> <a href="functions/nuevo.php" class="btn btn-white mb-3 rounded-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></a>
                        </a>
                    </div>
                    <!-- BUSCADOR E BOTÓN DE BUSCAR -->
                    <div class="input-group mb-3 mx-2 w-6">
                        <input id="campo" name="campo" class="form-control" type="text" placeholder="Búsqueda" aria-label="Search">
                        <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-primary text-white rounded-0">
                    </div>
                </form>
            </div>
        </nav>

        <!-- TÁBOA -->
        <div class="row table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-2">Nome</th>
                        <th class="col-sm-2">Poboación</th>
                        <th class="col-sm-2">Actividade</th>
                        <th class="col-sm-2">Incorporación</th>
                        <th class="col-sm-2">Tlf.</th>
                        <th class="col-sm-2">Fax</th>
                        <th class="col-sm-2">Accións</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['poboacion']; ?></td>
                            <td><?php echo $row['actividade']; ?></td>
                            <td><?php echo $row['data_incorporacion']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['fax']; ?></td>
                            <!-- NON BORRAR TD'S SEGUINTES -->
                            <!-- <td><?php echo $row['ofertas_contratacion']; ?></td> -->
                            <!-- <td><?php echo $row['ofertas_formacion']; ?></td> -->
                            <!-- BOTÓNS ACCIÓNS -->
                            <td class="d-flex"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye " viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg></a>
                                <a href="functions/modificar.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mx-2" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg></a>
                                <a href="functions/eliminar.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- COMPOÑENTE FOOTER -->
    <footer-component></footer-component>
</body>

</html>
