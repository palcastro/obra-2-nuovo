<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

//HEADER
ob_start();
include_once '../inc/header.php';

$buffer = ob_get_contents();
ob_end_clean();

$buffer = str_replace("%TITLE%", "Modificar rexistro", $buffer);
echo $buffer;

$id = $_GET['id'];

$sql = "SELECT * FROM persoas WHERE id = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<body>

  <!-- ESTRUTURA PARA TER VARIAS FICHAS DINÁMICAS NUNHA MESMA PÁXINA -->


  <!-- TABS CON BOOTSTRAP -->
  <div class="container-fluid px-md-5 my-4">

<h4 class="mb-4 text-primary text-center"><b>MODIFICAR DATOS DA PERSOA</b></h4>
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

    <!-- CONTIDOS TABS-->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade py-3 px-4 show active" id="datospersoais" role="tabpanel" aria-labelledby="datospersoais-tab">
        <!-- DATOS PERSOAIS -->
        <div class="container">
        <div class="d-flex flex-wrap">
          <div class="col-md-4 my-2">
            <label for="nome" class="control-label"> NOME:</label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="nombre" name="nome" placeholder="Nome" value="<?php echo $row['nome']; ?>" required>
            </div>
          </div>

          <div class="col-md-4 my-2">
            <label for="primeiro_apelido" class=" control-label">PRIMEIRO APELIDO:</label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="nombre" name="primeiro_apelido" placeholder="Primeiro Apelido" value="<?php echo $row['primeiro_apelido']; ?>" required>
            </div>
          </div>


          <div class="col-md-4 my-2">
            <label for="segundo_apelido" class="control-label">SEGUNDO APELIDO:</label>

            <div class="col-md-10">
              <input type="text" class="form-control" id="nombre" name="segundo_apelido" placeholder="Segundo Apelido" value="<?php echo $row['segundo_apelido']; ?>" required>
            </div>
          </div>

          <div class="col-md-4 my-2">
            <label for="nif" class=" control-label">DNI / NIF:</label>
            <div class="col-md-10">
              <input type="tel" class="form-control" id="nif" name="nif" placeholder="Número do DNI" pattern="[0-9]{8}+[A-Z]{1}" maxlength="9" value="<?php echo $row['nif']; ?>" required>
            </div>
          </div>

          <div class="col-md-4 my-2">
            <label for="data_nacemento" class="control-label">DATA DE NACEMENTO:</label>
            <div class="col-md-10">
              <input type="date" class="form-control" id="data_nacemento" name="data_nacemento" placeholder="dd-mm-aa" value="<?php echo $row['data_nacemento']; ?>" required>
            </div>
          </div>

          <div class="col-md-4 my-2">

            <label for="sexo" class="control-label">SEXO:</label>
            <div class="col-md-10">
              <select class="form-control" id="sexo" name="sexo">
                <option value="text" disabled selected hidden>...</option>
                <option value="HOME">Home</option>
                <option value="MULLER">Muller</option>
                <option value="OUTRO">Non definido</option>
              </select>
            </div>
          </div>


          <div class="col-md-4 my-2">
            <label for="codigo_postal" class="control-label">CP:</label>
            <div class="col-md-10">
              <input type="tel" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código postal" maxlength="5" value="<?php echo $row['codigo_postal']; ?>" required>
            </div>
          </div>

          <div class="col-md-4 my-2">
            <label for="telefono" class="control-label">TELÉFONO:</label>
            <div class="col-md-10">
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="9" value="<?php echo $row['telefono']; ?>" required>
            </div>
          </div>


          <div class="col-md-4 my-2">
            <label for="email" class="control-label">CORREO ELECTRÓNICO:</label>
            <div class="col-md-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"value="<?php echo $row['email']; ?>" >
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">GARDAR</button>
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
      <div class="col-md-4">
        <div class="my-4">
          <a href="index.php" class="btn btn-default">VOLVER</a>
          <button type="submit" class="btn btn-primary">GARDAR</button>
        </div>
      </div>
    </div><!-- end tab formacion -->


    <!-- EXPERIENCIA -->
    <div class="tab-pane fade py-3 px-4" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, debitis rerum quod eligendi minima impedit provident magnam distinctio omnis. Ullam ducimus nobis architecto dolorum officiis cupiditate veniam nihil molestiae iusto.
    <div class="col-md-4">
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">GARDAR</button>
          </div>
        </div>

    </div>

    <!-- OFERTAS -->
    <div class="tab-pane fade py-3 px-4" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
      <div class="container section">
        <div class="row">
          <div class="col-md-3">
            <!-- card #1 -->
            <div class="card py-3 px-2">
              <h4 class="h5 card-title">TIPO DE OFERTA: <span> Contratación</span></h4>
              <p class="card-text m-0">EMPRESA: <span>A quesexa</span></p>
              <p class="card-text m-0">POSTO: <span>Capataz</span></p>
              <p class="card-text">DATA: <span>12-03-2020</span></p>
              <a href="#" class="link-btn">Ver oferta</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
          <div class="my-4">
            <a href="index.php" class="btn btn-default">VOLVER</a>
            <button type="submit" class="btn btn-primary">GARDAR</button>
          </div>
        </div>


    </div>
  </div>
  </div>

  <!--COMPOÑENTE FOOTER-->
  <?php
  include_once '../inc/footer.php';
  ?>

  <script src="../tabs.js"></script>
</body>

</html>
