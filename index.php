<?php
require 'conexion/conexion.php';
require 'conexion/sesion.php';
// este cacho de php tiene que ir SIEMPRE al inicio de los archivos de las páginas (a no ser que
// solo actúen como funciones y no haya front-end), y excepto aquí en el index deben ponerse los
// dos puntos y / antes del nombre de la carpeta (ver por ejemplo nuevo.php de persoas)
?>

<!DOCTYPE html>
<html>
<?php

// Script title que toma el header.
ob_start();
include_once './inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Benvid@ ao SOL", $buffer);
echo $buffer;

?>
<body>
  <!-- Menú -->

  <?php
  include_once './inc/header.php';
  ?>


  <!-- Contido principal -->
  <div class="container">
  <div class="p-3 m-1 text-primary">
    <h2 class="display-7 text-center">Benvid@ ao Servizo de Orientación Laboral</h2>
  </div>
<div class="card mb-2">
  <div class="row g-0">
    <div class="col-md-6" style="background: center center url(./assets/img/cies.jpg); min-height: 40vh; " >
    </div>
    <div class="col-md-4">
      <div class="card-body align-middle p-5 mx-5"
        <!-- enlaces a outros servizos -->
        <ul class="list-unstyled list-group mt-lg-3">
          <li class="list-group-item mb-2 border-0 text-nowrap lead inicio"><a class="mb-6 px-2 py-3 w-100 text-decoration-none" href="https://sede.vigo.org/portal-empregado/#/gestionLogin" target="_blank">
          <img class="bi m-1" height="32" src="./assets/img/portal.png" alt="Portal do empregado">
              Portal do emprego</a>
            </li>
          <li class="list-group-item mb-2 border-0 text-nowrap lead inicio"><a class="mb-6 px-2 py-3 w-100 text-decoration-none" href="https://correo.vigo.org/zimbra/" target="_blank">
          <img class="bi m-1" height="32" src="./assets/img/zimbra.png"  alt="Zimbra">
              Correo Zimbra</a>
          </li>
          <li class="list-group-item mb-2 border-0 text-nowrap lead inicio"><a class="mb-6 px-2 py-3 w-100 text-decoration-none" href="https://hoxe.vigo.org/" target="_blank">
          <img class="bi m-1" height="32" src="./assets/img/escudo.png"  alt="Concello de Vigo">
              Concello de Vigo</a>
          </li>
          <li class="list-group-item mb-2 border-0 text-nowrap lead inicio"><a class="mb-6 px-2 py-3 w-auto text-decoration-none" href="#" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-filetype-pdf m-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
              </svg>
              Manual do usuario</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
    <?php
    include_once './inc/footer-index.php';
    ?>
    </body>

</html>
