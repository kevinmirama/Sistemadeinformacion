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
  <title>PracSys - Lista de Prácticas</title>
</head>

<body>
  <?php
  session_start();
  include_once '../class/classDAO/tiempo.php';
  include '../class/classDAO/usuariosDAO.php';
  include '../class/classDAO/usuariospracticaDAO.php';

  $usuariosDAO = new usuariosDAO();

  if (!empty($_SESSION['id_usuario'])) {

    switch ($_SESSION['id_rol']) {
      case 1:
        include 'menus/m_admin.php';
        break;
      case 2:
        include 'menus/m_cordi.php';
        break;
      case 3:
        include 'menus/m_asesor.php';
        if(empty($_POST['n'])){
          zonaSeguraDentro();
        }
        if (!empty($_POST['opc'])) {
          //echo 'pase';
          switch ($_POST['opc']) {
            case 1:
                $id_usupractica= $_POST['id_usupractica'];
                $id_practica= $_POST['n'];
                $id_usu= $_POST['id_usu'];
                $institucion= $_POST['institucion'];
                $observaciones= 'Reg - '.$_SESSION['id_usuario'];
                $OBJusuariopractica= new usuariospracticaClass();
                $OBJusuariopractica->setCod_usu($id_usupractica);
                $OBJusuariopractica->setObservaciones($observaciones);
                $OBJusuariopractica->setId_institucion($institucion);
                $OBJusuariopractica->setId_estado(1);
                $OBJusuariopractica->setId_usu($id_usu);
                $OBJusuariopractica->setId_practica($id_practica);
                $usuariospracticaDAO = new usuariosPracticaDAO();
                $usuariospracticaDAO->create($OBJusuariopractica);
              break;
          }
        }
  ?>
        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <!----------------------------------------------------------------------------------->

          <div class="row container-fluid">
            <!---------------------------------------------------------------->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="estreg-tab" data-bs-toggle="tab" data-bs-target="#estreg" type="button" role="tab" aria-controls="estreg" aria-selected="true">Estudiantes registrados</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="estsinreg-tab" data-bs-toggle="tab" data-bs-target="#estsinreg" type="button" role="tab" aria-controls="estsinreg" aria-selected="false">Estudiantes sin registrar</button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="estreg" role="tabpanel" aria-labelledby="estreg-tab">
                <br>
                <h2 class="text-center">Estudiantes práctica</h2><br>
                <div>
                  <?php
                  $usuariosDAO->listarEstudiantes($_POST['n']);
                  ?>
                </div>
              </div>
              <div class="tab-pane fade" id="estsinreg" role="tabpanel" aria-labelledby="estsinreg-tab">
                <br>
                <h2 class="text-center">Estudiantes sin registrar </h2><br>
                <div>
                  <?php
                
                  $id_prog = $_SESSION['id_prog'];
                  $usuariosDAO->listarUsuariosPractica($_SESSION['id_prog'], 4, $_POST['n']);
                  ?>
                </div>
              
              </div>
            </div>

          </div>
          <!----------------------------------------------------------------------------------->

<br>
<br>
          <?php include('./menus/footer.php');   ?>
        </section>

  <?php
        break;
      case 4:
        include 'menus/m_estudi.php';
        break;
      case 5:
        include 'menus/m_titular.php';
        break;
    }
  } else {
    zonaSegura();
  }


  include 'menus/scriptsFinales.php';

  ?>
  <script src="js/scriptBusqueda.js"></script>

</body>
</html>