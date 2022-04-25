<!-- HEADER XERAL -->
<!DOCTYPE html>
<html lang="gl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOL - <?php echo ('%TITLE%'); ?></title>
  <link rel="stylesheet" href="../../assets/css/index.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex p-1">
    <div class="container-fluid02">
      <!-- MENÚ HAMBURGUESA -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-uppercase" id="navbarTogglerDemo02">
        <!-- ICONA PERSOA -->
        <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/index.php") { ?> class="nav-link active" aria-current="true" <?php } else {  ?> class="nav-link" <?php } ?> href="/index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == '/citas/index.php') { ?> class="nav-link active" aria-current="true" <?php   } else {  ?> class="nav-link" <?php } ?> href="/citas/index.php">Axenda</a>
          </li>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == '/persoas/index.php') { ?> class="nav-link active" aria-current="true" <?php   } else {  ?> class="nav-link" <?php } ?> href="/persoas/index.php">Persoas</a>
          </li>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/empresas/index.php") { ?> class="nav-link active" aria-current="true" <?php   } else {  ?> class="nav-link" <?php } ?> href="/empresas/index.php">Empresas</a>
          </li>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/ofertas/index.php") { ?> class="nav-link active" aria-current="true" <?php   } else {  ?> class="nav-link" <?php } ?> href="/ofertas/index.php">Ofertas</a>
          </li>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/informes/index.php") { ?> class="nav-link active" aria-current="true" <?php   } else {  ?> class="nav-link" <?php } ?> href="/informes/index.php">Informes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/login/logout.php">Saír</a>
          </li>
        </ul>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="input-group">
            <input class="form-control border rounded-start" type="text" placeholder="..." id="example-search-input" alt="Barra de búsqueda">
            <span class="input-group-append">
              <button class="btn btn-secondary rounded-0 rounded-end buscador" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
              </button>
            </span>
          </div>
        </form>

      </div>
    </div>
  </nav>
</body>

</html>
