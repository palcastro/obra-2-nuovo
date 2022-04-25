<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

// HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Ver rexistro", $buffer);
echo $buffer;

$id = $_GET['id'];

$sql = "SELECT * FROM persoas WHERE id = '$id'";
$ficha = $mysqli->query($sql);
$row = $ficha->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<body>
  <!--TÁBOA DATOS-->
  <main>


    <!-- TABS CON BOOTSTRAP -->
    <div class="container-fluid px-md-5 my-5">
      <!-- TABS -->
      <!-- TABS MENÚ-->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item w-auto" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#datospersoais" type="button" role="tab" aria-controls="home" aria-selected="true">Datos persoais</button>
        </li>
        <li class="nav-item w-auto" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#formacion" type="button" role="tab" aria-controls="profile" aria-selected="false">Formación</button>
        </li>
        <li class="nav-item w-auto" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#experiencia" type="button" role="tab" aria-controls="contact" aria-selected="false">Experiencia</button>
        </li>
        <li class="nav-item w-auto" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#ofertas" type="button" role="tab" aria-controls="contact" aria-selected="false">Ofertas</button>
        </li>
      </ul>


      <!-- CONTIDOS TABS -->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade py-3 px-4 show active" id="datospersoais" role="tabpanel" aria-labelledby="datospersoais-tab">
          <!-- DATOS PERSOAIS -->
          <div class="container">
            <div class="row align-items-start my-3">
              <div class="col p-2 me-lg-4 bd-highlight text-start">
                <p id="id" class="visually-hidden"><?php echo $row['id']; ?></p>
                <p class="flex-md-wrap"><span class="opacity-50">NOME:</span><span class="text-nowrap"> <?php echo $row['nome']; ?></span></p>
                <p class="flex-md-wrap"><span class="opacity-50">1º APELIDO:</span> <?php echo $row['primeiro_apelido']; ?>
                </p>
                <p class="flex-md-wrap"><span class="opacity-50">2º APELIDO:</span> <?php echo $row['segundo_apelido']; ?>
                </p>
              </div>

              <div class="col p-2 me-lg-4 bd-highlight text-start">
                <p class="text-nowrap"><span class="opacity-50">DNI/NIF:</span> <?php echo $row['nif']; ?></p>
                <p class="flex-md-wrap"><span class="opacity-50">DATA DE NACEMENTO:</span> <span class="text-nowrap"><?php echo $row['data_nacemento']; ?></span></p>
                <p class="text-nowrap"><span class="opacity-50">SEXO:</span> <?php echo $row['sexo']; ?> </p>
              </div>

              <div class="col p-2 me-lg-4 bd-highlight text-start">
                <p class="text-nowrap"><span class="opacity-50">TELÉFONO:</span> <?php echo $row['telefono']; ?></p>
                <p class="flex-md-nowrap"><span class="opacity-50">CORREO ELECTRÓNICO:</span> <?php echo $row['email']; ?>
                </p>
                <p class="text-nowrap"><span class="opacity-50">CP:</span> <?php echo $row['codigo_postal']; ?></p>
              </div>
            </div>

            <div class="row align-items-start my-3">
              <p class="lead text-uppercase opacity-50">Accións</p>
              <div class="col">
                <p class="text-nowrap"><span class="opacity-50">DATA DA 1ª ENTREVISTA:</span> <?php // echo $row['data_p_cita'];
                                                                                              ?>
                <p class="text-nowrap"><span class="opacity-50">ORIENTADOR/A:</span> <?php // echo $row['orientador_p_cita'];
                                                                                      ?>
                <p class="text-nowrap"><span class="opacity-50">CANLE DE ACCESO:</span> <?php // echo $row['orientador_p_cita'];
                                                                                        ?>
              </div>
              <div class="col">
                <p class="text-nowrap"><span class="opacity-50">SEGUIMENTO:</span> <?php // echo $row['orientador_p_cita'];
                                                                                    ?>
                <p class="text-nowrap"><span class="opacity-50">ACCIÓNS DO SOL:</span> <?php // echo $row['orientador_p_cita'];
                                                                                        ?>
                <p class="text-nowrap"><span class="opacity-50">NOTAS E CONSIDERACIÓNS</span> <?php // echo $row['orientador_p_cita'];
                                                                                              ?>
              </div>
            </div>
            <div class="my-4">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="index.php" class="btn btn-primary">VOLVER</a>
            </div>
          </div>
          </div>

        </div>

        <!-- FORMACIÓN -->
        <div class="tab-pane fade py-3 px-4" id="formacion" role="tabpanel" aria-labelledby="formacion-tab">
          <div class="d-flex flex-wrap">
            <div class="col-md-4 my-2">
              <label for="estudo" class="control-label">ESTUDOS BÁSICOS:</label>
              <div class="col-md-10">
                <select class="form-control" id="estudos" name="estudos">
                  <option value="text" disabled selected hidden>Formación Básica</option>
                  <option value="ESO">E.S.O</option>
                  <option value="COU">C.O.U</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="superiores" class="control-label">ESTUDOS SUPERIORES:</label>
              <div class="col-md-10">
                <select class="form-control" id="superiores" name="superiores">
                  <option value="text" disabled selected hidden>Formación Superior</option>
                  <option value="uni">Universitarios</option>
                  <option value="nouni">Non Universitarios</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="universitarios" class="control-label">UNIVERSITARIOS:</label>
              <div class="col-md-10">
                <select class="form-control" id="universitarios" name="universitarios">
                  <option value="text" disabled selected hidden>Estudos Universitarios</option>
                  <option value="grao">Grao</option>
                  <option value="master">Master</option>
                  <option value="master">Doutorado</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="non-universitarios" class="control-label">NON UNIVERSITARIOS: </label>
              <div class="col-md-10">
                <select class="form-control" id="non-universitarios" name="nonuniversitarios">
                  <option value="text" disabled selected hidden>Outros</option>
                  <option value="bacharelato">Bacharelato</option>
                  <option value="formacion-profesional">Formación Profesional</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="fp" class="control-label">FORMACIÓN PROFESIONAL:</label>
              <div class="col-md-10">
                <select class="form-control" id="formacion" name="formacion">
                  <option value="text" disabled selected hidden>Formación Profesional</option>
                  <option value="superior">Superior</option>
                  <option value="media">Media</option>
                  <option value="basica">Básica</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="familias" class="control-label">FAMILIAS PROFESIONAIS:</label>
              <div class="col-md-10">
                <select class="form-control" id="familias" name="familias">
                  <option value="text" disabled selected hidden>Familias profesionais</option>
                  <option value="informatica">Informática e comunicacións</option>
                  <option value="admin">Administración e Xestión</option>
                  <option value="madeira">Madeira, moble e corcho</option>
                  <option value="auga">Enerxía e auga</option>
                  <option value="imaxe">Imaxe persoal</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="complementaria" class="control-label">FORMACIÓN COMPLEMENTARIA:</label>
              <div class="col-md-10">
                <select class="form-control" id="complementaria" name="complementaria">
                  <option value="text" disabled selected hidden>Formación Complementaria</option>
                  <option value="certificados">Certificados Oficiais</option>
                  <option value="curso">Curso Manipulador de Alimentos</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="idiomas" class="control-label">IDIOMAS:</label>
              <div class="col-md-10">
                <select class="form-control" id="idiomas" name="idiomas">
                  <option label="Niveis">
                  <option value="text" disabled selected hidden>Niveis</option>
                  <option value="B1">B1</option>
                  <option value="B2">B2</option>
                  </option>
                </select>

                <select class="form-control" id="idiomas" name="idiomas">
                  <option label="Curso">
                  <option value="text" disabled selected hidden>Certificación</option>
                  <option value="text">Cambridge</option>
                  <option value="text">Oxford</option>
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <label for="otros" class="control-label">OUTROS:</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                <label class="form-check-label" for="defaultCheck">Viviu no estranxeiro</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                <label class="form-check-label" for="defaultCheck">Homologado</label>
                <!-- <label>Homologado</label> -->
                <!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> Si
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"> Non -->
              </div>
            </div>
            <div class="form-group col-md-4 my-2">
              <label for="exampleFormControlTextarea">NOTAS E CONSIDERACIÓNS:</label>
              <textarea class="form-control" id="exampleFormControlTextarea" rows="3"></textarea>
            </div>
          </div>
          <div class="my-4">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="index.php" class="btn btn-primary">VOLVER</a>
            </div>
          </div>
        </div><!-- end tab formacion -->


        <!-- EXPERIENCIA -->
        <div class="tab-pane fade py-3 px-4" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, debitis rerum quod eligendi minima impedit provident magnam distinctio omnis. Ullam ducimus nobis architecto dolorum officiis cupiditate veniam nihil molestiae iusto.
          <div class="my-4">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="index.php" class="btn btn-primary">VOLVER</a>

            </div>
          </div>

        </div>

        <!-- OFERTAS -->
        <div class="tab-pane fade py-3 px-4" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">

          <div class="container section">
            <div class="row">
              <div class="col-md-3">
                <!-- CARD #1 -->
                <div class="card py-3 px-2">
                  <h4 class="h5 card-title">TIPO DE OFERTA: <span> Contratación</span></h4>
                  <p class="card-text m-0">EMPRESA: <span>A quesexa</span></p>
                  <p class="card-text m-0">POSTO: <span>Capataz</span></p>
                  <p class="card-text">DATA: <span>12-03-2020</span></p>
                  <a href="#" class="link-btn">Ver oferta</a>
                </div>
              </div>
            </div>
            <div class="my-4">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="index.php" class="btn btn-primary">VOLVER</a>
            </div>
          </div>
          </div>

        </div>
      </div>
    </div>





  </main>

  <!--COMPOÑENTE FOOTER-->
  <?php
  include_once '../inc/footer.php';
  ?>
</body>

</html>
