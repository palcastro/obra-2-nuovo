<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// Menú y script title que toma el header.
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Nova empresa", $buffer);
echo $buffer;
?>

<!DOCTYPE html>
<html>
<body>

<!-- ESTRUCTURA PARA TENER VARIAS PESTAÑAS DINÁMICAS EN UNA MISMA PÁGINA -->
<h2 class="my-4 text-center text-primary">Novo rexistro de empresa</h2>

<div class="t-container">
  <!-- Pestañas superiores -->
  <ul class="t-tabs">
    <li class="t-tab">Datos Empresa</li>
    <li class="t-tab">Seguimento</li>
    <li class="t-tab">Ofertas de Formación</li>
    <li class="t-tab">Ofertas de Contratación</li>
  </ul>
  <!-- Contenido de cada apartado -->
  <ul class="t-contents">

    <li class="t-content">
      <form class="row g-3 mt-4" method="POST" action="functions/guardar.php" autocomplete="off">
        <!-- Datos empresa -->
        <div class="col-md-4">
          <label for="nome" class="control-label">NOME:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nome" placeholder="Nome" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="poboacion" class="ontrol-label">LOCALIDADE:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="localidade" name="localidade" placeholder="Localidade..." required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="poboacion" class="ontrol-label">POBOACIÓN:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="poboacion" name="poboacion" placeholder="Poboacion" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="actividade" class="control-label">ACTIVIDADE:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="actividade" name="actividade" placeholder="Actividade" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="telefono" class="control-label">TELEFÓNO:</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="9" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="telefono" class="control-label">FAX:</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="fax" name="fax" placeholder="Número de Fax" maxlength="9">
          </div>
        </div>

        <div class="col-md-4">
          <label for="data_alta" class="control-label">DATA DE ALTA:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="email" name="data_incorporacion" placeholder="dd-mm-aa" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="poboacion" class="ontrol-label">PERSOA DE CONTACTO:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="persoa_contacto" name="persoa_contacto" placeholder="" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="orientador" class="control-label">ORIENTADOR/A:</label>
          <div class="col-sm-10">
            <select class="form-control" id="orientador" name="orientador">
              <option value="">Cea Rodríguez, Alberte</option>
              <option value="">García Barbosa, Eva</option>
              <option value="">De Monasterio Roldan, Celia</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <label for="ofertas_emprego" class="control-label">OFERTAS DE EMPREGO:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" name="ofertas_contratacion" placeholder="Ofertas emprego" required>
          </div>
        </div>

        <div class="col-md-4">
          <label for="ofertas_formacion" class="control-label">OFERTAS DE FORMACIÓN:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" name="ofertas_formacion" placeholder="Ofertas formacion" required>
          </div>
        </div>

        <div>
          <strong><label for="relacion-conselleria" class="control-label">RELACIÓNS COA CONSELLERÍA:</label></strong>
        </div>
        <div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="asesoramiento_sae" value="option1">
            <label class="form-check-label" for="asesoramiento_sae">Asesoramiento SAE</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="axudas" value="option2">
            <label class="form-check-label" for="axudas">Axudas á contratación</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="concesionaria" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">Concesionaria</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="formación" value="option2">
            <label class="form-check-label" for="formacion">Formación</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="mailing" value="option3">
            <label class="form-check-label" for="mailing">Mailing</label>
          </div>
        </div>

        <div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="oferta" value="option1">
            <label class="form-check-label" for="oferta">Oferta de emprego</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="practicas" value="option2">
            <label class="form-check-label" for="practicas">Prácticas</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="prospeccion" value="option3">
            <label class="form-check-label" for="prospeccion">Prospección</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="proveedor" value="option1">
            <label class="form-check-label" for="proveedor">Proveedor</label>
          </div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="solicitude" value="option2">
            <label class="form-check-label" for="solicitude">Solicitude información</label>
          </div>
        </div>

        <div>
          <div class="form-check form-check-inline col-2">
            <input class="form-check-input" type="checkbox" id="desconocida" value="option1">
            <label class="form-check-label" for="desconocida">Descoñecida</label>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">NOTAS E CONSIDERACIÓNS:</label>
          <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
        </div>

        <div>
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">GARDAR</button>
          </div>
        </div>
      </form>

    </li>

    <li class="t-content">
      <div class="col-sm-10 mt-4">
        <select class="form-control" id="canle" name="canle">
          <option value="text" disabled selected hidden>...</option>
          <option value="">Web</option>
          <option value="">Física</option>
          <option value="">Por contacto</option>
        </select>
      </div>
      <!-- BOTON MODAL QUE SE ABRE AL PULSAR EL NUEVO SEGUIMIENTO -->
      <!-- Ofertas de formación -->
      <div class="my-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Novo Seguimento</button>
      </div>
    </li>
    <li class="t-content">
      <p>Non se encontraron Ofertas de Formación</p>
      <div class="my-4">
        <button type="submit" class="btn btn-primary">Crear Oferta</button>
      </div>
    </li>
    <!-- Ofertas de contratación -->
    <li class="t-content">
      <p>Non se encontraron Ofertas de Contratación</p>
      <div class="my-4">
        <button type="submit" class="btn btn-primary">Crear Oferta</button>
      </div>
    </li>

  </ul>
</div>
<!-- Componente footer -->
<?php
include_once '../inc/footer.php';
?>

<script src="../tabs.js"></script>

</body>

<!-- FORMULARIO DE LA VENTANA MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Seguimento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="functions/guardar.php" autocomplete="off">

          <div class="mb-3">
            <label for="data_alta" class="control-label">Data de alta:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="data_modal" name="data_incorporacion_modal" placeholder="dd-mm-aa" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="orientador" class="control-label">Orientador/a</label>
            <div class="col-sm-10">
              <select class="form-control" id="orientador_modal" name="orientador_modal">
                <option value="">Cea Rodríguez, Alberte</option>
                <option value="">García Barbosa, Eva</option>
                <option value="">De Monasterio Roldan, Celia</option>
              </select>
            </div>
          </div>

          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Anotacións</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Dispoñible</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Traballa</label>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Pechar</button>
        <button type="button" class="btn btn-primary">Gardar</button>
      </div>
    </div>
  </div>
</div>

</html>
