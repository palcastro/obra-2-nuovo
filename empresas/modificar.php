<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

//MENÚ E SCRIPT TÍTULO QUE TOMA DO HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Modificar empresa", $buffer);
echo $buffer;

$id = $_GET['id'];

$sql = "SELECT * FROM empresas WHERE id = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<body>

<!-- ESTRUTURA PARA AS TABS -->
<div class="container-fluid px-md-5 my-4">
    <h4 class="mb-4 text-primary text-center"><b>MODIFICAR DATOS DA EMPRESA</b></h4>
 <!-- TABS -->
    <!-- MENÚ TABS -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item w-auto" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#datosempresa" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Empresa</button>
      </li>
      <li class="nav-item w-auto" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#seguimento" type="button" role="tab" aria-controls="profile" aria-selected="false">Seguimento</button>
      </li>
      <li class="nav-item w-auto" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#ofertasdeformacion" type="button" role="tab" aria-controls="contact" aria-selected="false">Ofertas de Formación</button>
      </li>
      <li class="nav-item w-auto" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#ofertasdecontratacion" type="button" role="tab" aria-controls="contact" aria-selected="false">Ofertas de Contratación</button>
      </li>

    </ul>

 <!-- ---------------------------APARTADOS------------------------------------------- -->


 <div class="tab-content" id="myTabContent">
      <!-- DATOS EMPRESA NOVAS TABS -->
      <div class="tab-pane fade py-3 px-4 show active" id="datosempresa" role="tabpanel" aria-labelledby="datosempresa-tab">
        <div class="container">
          <form class="row g-3 mt-4" method="POST" action="functions/guardar.php" autocomplete="off">
            <div class="d-flex flex-wrap">

              <div class="col-md-4 my-2">
                <label for="nome" class="control-label">NOME:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="nombre" name="nome" placeholder="Nome" value="<?php echo $row['nome']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="localidade" class="control-label">LOCALIDADE:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="localidade" name="localidade" placeholder="Localidade..." value="<?php echo $row['localidade']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="poboacion" class="control-label">POBOACIÓN:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="poboacion" name="poboacion" placeholder="Poboacion" value="<?php echo $row['poboacion']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="actividade" class="control-label">ACTIVIDADE:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="actividade" name="actividade" placeholder="Actividade" value="<?php echo $row['actividade']; ?>" required>
                </div>
              </div>

              <div class="col-md-4">
                <label for="telefono" class="control-label">TELEFÓNO:</label>
                <div class="col-md-10">
                  <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="9" value="<?php echo $row['telefono']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="fax" class="control-label">FAX:</label>
                <div class="col-md-10">
                  <input type="tel" class="form-control" id="fax" name="fax" placeholder="Número de Fax" value="<?php echo $row['fax']; ?>" maxlength="9">
                </div>
              </div>

              <div class="col-md-4">
                <label for="data_incorporacion" class="control-label">DATA DE ALTA:</label>
                <div class="col-md-10">
                  <input type="date" class="form-control" id="email" name="data_incorporacion" placeholder="dd-mm-aa" value="<?php echo $row['data_incorporacion']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="persoa_contacto" class="control-label">PERSOA DE CONTACTO:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="persoa_contacto" name="persoa_contacto" placeholder="" value="<?php echo $row['persoa_contacto']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="orientador" class="control-label">ORIENTADOR/A:</label>
                <div class="col-md-10">
                  <select class="form-control" id="orientador" name="orientador">
                    <option value="">Cea Rodríguez, Alberte</option>
                    <option value="">García Barbosa, Eva</option>
                    <option value="">De Monasterio Roldan, Celia</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="ofertas_contratacion" class="control-label">OFERTAS DE EMPREGO:</label>
                <div class="col-md-10">
                  <input type="number" class="form-control" id="email" name="ofertas_contratacion" placeholder="Ofertas emprego" value="<?php echo $row['ofertas_contratacion']; ?>" required>
                </div>
              </div>

              <div class="col-md-4 my-2">
                <label for="ofertas_formacion" class="control-label">OFERTAS DE FORMACIÓN:</label>
                <div class="col-md-10">
                  <input type="number" class="form-control" id="email" name="ofertas_formacion" placeholder="Ofertas formacion" value="<?php echo $row['ofertas_formacion']; ?>" required>
                </div>
              </div>



            </div>
            <hr>
            <!-- DATOS PARTE INFERIOR- DATOS EMPRESA-->
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
                <label class="form-check-label" for="axudas">Axudas </label>
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

            <div class="form-group ">
              <label for="exampleFormControlTextarea1">NOTAS E CONSIDERACIÓNS:</label>
              <textarea class="form-control" id="notas" name="notas" rows="4" ></textarea>
            </div>

            <div class="col-md-4">
              <div class="my-4">
                <a href="index.php" class="btn btn-default">VOLVER</a>
                <button type="submit" class="btn btn-primary">GARDAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>



      <!-- SEGUIMENTO -->
      <div class="tab-pane fade py-3 px-4" id="seguimento" role="tabpanel" aria-labelledby="seguimento-tab">
        <div class="container mt-4">
          <select class="form-control" id="canle" name="canle">
            <option value="text" disabled selected hidden>...</option>
            <option value="">Web</option>
            <option value="">Física</option>
            <option value="">Por contacto</option>
          </select>

          <!-- BOTON MODAL- ÁBRESE AO PULSAR NOVO SEGUIMENTO -->

          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Novo Seguimento</button>
          </div>


          <!-- FORMULARIO MODAL -->
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





        </div>
      </div>


      <!-- OFERTAS FORMACIÓN -->

      <div class="tab-pane fade py-3 px-4 " id="ofertasdeformacion" role="tabpanel" aria-labelledby="ofertasdeformacion-tab">

        <div class="container mt-4">
          <p>Non se encontraron Ofertas de Formación</p>
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">Crear Oferta</button>
          </div>
        </div>
      </div>


      <!-- OFERTAS CONTRATACIÓN -->
      <div class="tab-pane fade py-3 px-4 " id="ofertasdecontratacion" role="tabpanel" aria-labelledby="ofertasdecontratacion-tab">
        <div class="container mt-4">

          <p>Non se encontraron Ofertas de Contratación</p>
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">Crear Oferta</button>
          </div>
        </div>

      </div>



    </div>


  </div>

  <!-- COMPOÑENTE FOOTER -->
  <?php
  include_once '../inc/footer.php';
  ?>



</body>





</html>
