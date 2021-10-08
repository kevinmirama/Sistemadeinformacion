<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilodashboard.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Iconos de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="js/sweetalert2.all.min.js"></script>

  <title>PracSys - Lista de Usuarios</title>
</head>

<body>
<?php

session_start();
include '../class/classDAO/usuariosDAO.php';
include_once '../class/classDAO/tiempo.php';
$usuariosDAO = new usuariosDAO();
if (!empty($_POST['opc'])) {
  $id_usu = $_POST['id_usu'];
  $nom_usu = $_POST['nom_usu'];
  $ape_usu = $_POST['ape_usu'];
  $tel_usu = $_POST['tel_usu'];
  $email_usu = $_POST['email_usu'];
  $pass_usu = $_POST['id_usu'];
  $id_genero = $_POST['id_genero'];
  $id_prog = $_SESSION['id_prog'];

  if ($_SESSION['id_rol']==1) {
    if ($_POST['opc'] == 2) {
      $cod_usu = $_POST['cod_usu'];
      $id_rol = 2;
    } elseif ($_POST['opc'] == 3) {
      $cod_usu = $_POST['id_usu'];
      $id_rol = 3;
    }
    elseif ($_POST['opc'] == 4) {
      $cod_usu = $_POST['id_usu'];
      $id_rol = 4;
    }
    else{
      mensajeError("Estas intentando hackear el sistema, mucho cuidado!!");
      echo '<meta http-equiv="refresh" content="2;url=listarUsuariosView.php">';
    }
  }elseif ($_SESSION['id_rol']==2) {
    if ($_POST['opc'] == 3) {
      $cod_usu = $_POST['id_usu'];
      $id_rol = 3;
    }
    elseif ($_POST['opc'] == 4) {
      $cod_usu = $_POST['id_usu'];
      $id_rol = 4;
    }
    else{
      mensajeError("Estas intentando hackear el sistema, mucho cuidado!!");
      echo '<meta http-equiv="refresh" content="2;url=listarUsuariosView.php">';
    }
  }elseif ($_SESSION['id_rol']==3) {
    if ($_POST['opc'] == 4) {
      $cod_usu = $_POST['id_usu'];
      $id_rol = 4;
    }
    else{
      mensajeError("Estas intentando hackear el sistema, mucho cuidado!!");
      echo '<meta http-equiv="refresh" content="2;url=listarUsuariosView.php">';
    }
}

$usuariosOBJ = new usuariosClass();

if(!empty($_POST['id_p'])){
  $id_estado = $_POST['id_estado'];
  $usuariosOBJ->setId_usu($id_usu);
  $usuariosOBJ->setCod_usu($cod_usu);
  $usuariosOBJ->setNom_usu($nom_usu);
  $usuariosOBJ->setApe_usu($ape_usu);
  $usuariosOBJ->setTel_usu($tel_usu);
  $usuariosOBJ->setEmail_usu($email_usu);
  $usuariosOBJ->setId_genero($id_genero);
  $usuariosOBJ->setId_estado($id_estado);
  $usuariosDAO->update($usuariosOBJ, $_POST['id_p']);
}else{
  $id_estado = 1;
  $passEncrip = password_hash($pass_usu, PASSWORD_DEFAULT);
  $usuariosOBJ->setId_usu($id_usu);
  $usuariosOBJ->setCod_usu($cod_usu);
  $usuariosOBJ->setNom_usu($nom_usu);
  $usuariosOBJ->setApe_usu($ape_usu);
  $usuariosOBJ->setTel_usu($tel_usu);
  $usuariosOBJ->setEmail_usu($email_usu);
  $usuariosOBJ->setPass_usu($passEncrip);
  $usuariosOBJ->setId_genero($id_genero);
  $usuariosOBJ->setId_estado($id_estado);
  $usuariosOBJ->setId_prog($id_prog);
  $usuariosOBJ->setId_rol($id_rol);
  $usuariosDAO->create($usuariosOBJ);
}
  
}

?>



  <?php
  if (!empty($_SESSION['id_usuario'])) {
    $nom_usu = $_SESSION['nombre_usuario'];
    $id_rol = $_SESSION['id_rol'];
    $rol = $_SESSION['rol'];
    $id_usu = $_SESSION['id_usuario'];
    $programa =  $_SESSION['id_prog'];
    $logo = $_SESSION['logo'];
    $programa = $_SESSION['programa'];
    switch ($id_rol) {
        //Cuadrar la dashboard dependiendo del rol que se tenga

      case 1: ?>
        <?php include 'menus/m_admin.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabUsu" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="coordinadores-tab" data-bs-toggle="tab" data-bs-target="#coordinadores" type="button" role="tab" aria-controls="coordinadores" aria-selected="true">Coordinadores</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="asesores-tab" data-bs-toggle="tab" data-bs-target="#asesores" type="button" role="tab" aria-controls="asesores" aria-selected="true">Asesores</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Estudiantes</button>
              </li>
            </ul>
            <div class="tab-content" id="tabAdmin">
              <div class="tab-pane fade show active" id="coordinadores" role="tabpanel" aria-labelledby="coordinadores-tab">
                <h1 class="text-center">Coordinadores del programa</h1>
                <h2 class="text-center"><?php echo $_SESSION['programa']; ?></h2>

                <!---------------------------------------------------------------->

                <!-- Button  -->
                <div class="col-sm-3">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevocoordinador" style="background-color:#16697a"><i class="bi bi-plus-square"></i> Nuevo Coordinador
                  </button>
                </div>
                <div class='table table-responsive'>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 2);
                  ?>
                </div>


              </div>
              <div class="tab-pane fade" id="asesores" role="tabpanel" aria-labelledby="asesores-tab">
                <h1 class="text-center">Asesores del programa</h1>
                <h2 class="text-center"><?php echo $_SESSION['programa']; ?></h2>

                <div class="row container-fluid">
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevoasesor">
                      <i class="bi bi-plus-square"></i> Nuevo Asesor
                    </button>
                  </div>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 3);
                  ?>
                </div>
              </div>
              <div class="tab-pane fade" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <h1 class="text-center">Estudiantes del programa</h1>
                <h2 class="text-center"><?php echo $_SESSION['programa']; ?></h2>

                <div class="row container-fluid">
                  <!---------------------------------------------------------------->

                  <!-- Button  -->
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevoestudiante" style="background-color:#16697a"><i class="bi bi-plus-square"></i> Nuevo Estudiante
                    </button>
                  </div>
                  <div class='table table-responsive'>
                    <?php
                    $id_prog = $_SESSION['id_prog'];
                    $usuariosDAO->listarUsuarios($id_prog, 4);
                    ?>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php break;

      case 2: ?>
        <?php include 'menus/m_cordi.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabCoor" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="asesores-tab" data-bs-toggle="tab" data-bs-target="#asesores" type="button" role="tab" aria-controls="asesores" aria-selected="true">Asesores</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Estudiantes</button>
              </li>
            </ul>
            <div class="tab-content" id="tabCoor">
              <div class="tab-pane fade show active" id="asesores" role="tabpanel" aria-labelledby="asesores-tab">
                <h2 class="text-center">Asesores del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>

                <div class="row container-fluid">
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevoasesor">
                      <i class="bi bi-plus-square"></i> Nuevo Asesor
                    </button>
                  </div>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 3);
                  ?>
                </div>
              </div>
              <div class="tab-pane fade" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <h2 class="text-center">Estudiantes del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>

                <div class="row container-fluid">
                  <!---------------------------------------------------------------->

                  <!-- Button  -->
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevoestudiante" style="background-color:#16697a"><i class="bi bi-plus-square"></i> Nuevo Estudiante
                    </button>
                  </div>
                  <div class='table table-responsive'>
                    <?php
                    $id_prog = $_SESSION['id_prog'];
                    $usuariosDAO->listarUsuarios($id_prog, 4);
                    ?>
                  </div>

                </div>
              </div>
              <div class="tab-pane fade" id="docentes" role="tabpanel" aria-labelledby="docentes-tab">
                <h2 class="text-center">Docentes titulares del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>
                <div class="row container-fluid">
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevodocentetitular">
                      <i class="bi bi-plus-square"></i> Nuevo Docente Titular
                    </button>
                  </div>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 5);
                  ?>
                </div>
              </div>
            </div>



          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php break;

      case 3: ?>
        <?php include 'menus/m_asesor.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabAse" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Estudiantes</button>
              </li>
            </ul>

            <div class="tab-content" id="tabAse">

              <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <h2 class="text-center">Estudiantes del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>

                <!---------------------------------------------------------------->

                <!-- Button  -->
                <div class="col-sm-3">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevoestudiante" style="background-color:#16697a"><i class="bi bi-plus-square"></i> Nuevo Estudiante
                  </button>
                </div>
                <br>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 4);
                  ?>

              </div>
              <div class="tab-pane fade" id="docentes" role="tabpanel" aria-labelledby="docentes-tab">
                <h2 class="text-center">Docentes titulares del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>

                  <div class="col-sm-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevodocentetitular">
                      <i class="bi bi-plus-square"></i> Nuevo Docente Titular
                    </button>
                  </div>
                  <br>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 5);
                  ?>

              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php break;

      case 4: ?>
        <?php include 'menus/m_estudi.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabAse" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="docentes-tab" data-bs-toggle="tab" data-bs-target="#docentes" type="button" role="tab" aria-controls="docentes" aria-selected="false">Docentes titulares</button>
              </li>
            </ul>

            <div class="tab-content" id="tabAse">
              <div class="tab-pane fade show active" id="docentes" role="tabpanel" aria-labelledby="docentes-tab">
                <h2 class="text-center">Docentes titulares del programa</h2>
                <h3 class="text-center"><?php echo $_SESSION['programa']; ?></h3>

                  <div class="col-sm-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevodocentetitular">
                      <i class="bi bi-plus-square"></i> Nuevo Docente Titular
                    </button>
                  </div>
                  <br>
                  <?php
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuarios($id_prog, 5);
                  ?>

              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
  <?php break;

      default:
        break;
    }
  } else {
    zonaSegura();
  } ?>




  <!----- Tabs de trabajo --------------------------------------------------------------------------------------------->


  <!------------------------------------------------------------------------------------------------------------------->

  <div class="modal fade" id="anadirnuevocoordinador" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Añadir nuevo Coordinador</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="POST" name="formulario_registro">
            <div class="row">
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Identificación coordinador</label>
                <input type="text" name="id_usu" id="id_usu" class="form-control" placeholder="Identificación de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Nombre de coordinador</label>
                <input type="text" name="nom_usu" id="nom_usu" class="form-control" placeholder="Nombre de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Apellido de coordinador</label>
                <input type="text" name="ape_usu" id="ape_usu" class="form-control" placeholder="Apellido de Usuarior" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Teléfono de coordinador</label>
                <input type="text" name="tel_usu" id="tel_usu" class="form-control" placeholder=" Telefono de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Email de coordinador</label>
                <input type="text" name="email_usu" id="email_usu" class="form-control" placeholder=" Email de Usuario" required>
              </div>
              <div class="col-md-6">
                <label for="id_genero" class="form-label small">Género</label>
                <select id="id_genero" class="form-select" name="id_genero" required>
                  <option value="">Seleccione uno...</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                  <option value="3">Otro</option>
                </select><br>
              </div>
              <input type="hidden" name="opc" value="2">
              <div class="col-md-6">
                <label for="id_prog" class="form-label small">Programa</label>
                <?php echo '<br>' . $_SESSION['programa']; ?>
              </div>
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!---------------------------------------------------------------->


  <!----- Modales de trabajo --------------------------------------------------------------------------------------------->

  <div class="modal fade" id="anadirnuevoasesor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Añadir nuevo asesor</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="POST" name="formulario_registro">
            <div class="row">
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Identificación asesor</label>
                <input type="text" name="id_usu" id="id_usu" class="form-control" placeholder="Identificación de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Nombre de asesor</label>
                <input type="text" name="nom_usu" id="nom_usu" class="form-control" placeholder="Nombre de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Apellido de asesor</label>
                <input type="text" name="ape_usu" id="ape_usu" class="form-control" placeholder="Apellido de Usuarior" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Codigo de asesor</label>
                <input type="text" name="cod_usu" id="cod_usu" class="form-control" placeholder="Codigo de usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Teléfono de asesor</label>
                <input type="text" name="tel_usu" id="tel_usu" class="form-control" placeholder=" Telefono de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Email de asesor</label>
                <input type="text" name="email_usu" id="email_usu" class="form-control" placeholder=" Email de Usuario" required>
              </div>
              <div class="col-md-6">
                <label for="id_genero" class="form-label small">Género</label>
                <select id="id_genero" class="form-select" name="id_genero" required>
                  <option value="">Seleccione uno...</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                  <option value="3">Otro</option>
                </select><br>
              </div>
              <input type="hidden" name="opc" value="3">
              <div class="col-md-6">
              <label for='id_prog' class='form-label small'>Programa <?php echo $_SESSION['programa']; ?></label>

              </div>
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-------------------------------------------------------------------------------------------------------------------------->



  <div class="modal fade" id="anadirnuevoestudiante" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Añadir nuevo estudiante</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="POST" name="formulario_registro">
            <div class="row">
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Identificación estudiante</label>
                <input type="text" name="id_usu" id="id_usu" class="form-control" placeholder="Identificación de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Nombre de estudiante</label>
                <input type="text" name="nom_usu" id="nom_usu" class="form-control" placeholder="Nombre de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Apellido de estudiante</label>
                <input type="text" name="ape_usu" id="ape_usu" class="form-control" placeholder="Apellido de Usuarior" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Codigo de estudiante</label>
                <input type="text" name="cod_usu" id="cod_usu" class="form-control" placeholder="Codigo de usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Teléfono de estudiante</label>
                <input type="text" name="tel_usu" id="tel_usu" class="form-control" placeholder=" Telefono de Usuario" required>
              </div>
              <div class="col-sm-6">
                <label for="id_genero" class="form-label small">Email de estudiante</label>
                <input type="text" name="email_usu" id="email_usu" class="form-control" placeholder=" Email de Usuario" required>
              </div>
              <div class="col-md-6">
                <label for="id_genero" class="form-label small">Género</label>
                <select id="id_genero" class="form-select" name="id_genero" required>
                  <option value="">Seleccione uno...</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                  <option value="3">Otro</option>
                </select><br>
              </div>
              <input type="hidden" name="opc" value="4">
              <div class="col-md-6">
              <label for='id_prog' class='form-label small'>Programa <?php echo $_SESSION['programa']; ?></label>

              </div>
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!---------------------------------------------------------------->
 

  </section>

  <script src="js/scriptBusqueda.js"></script>
  <?php include_once 'menus/scriptsFinales.php'; ?>
  

</body>

</html>