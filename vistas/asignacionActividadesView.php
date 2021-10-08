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
  <title>PracSys - Asignar actividades</title>
</head>

<body>


  <?php

  session_start();
  include '../class/classDAO/actividadesDAO.php';
  include '../class/classDAO/asignacionDAO.php';

  $actividadDAO = new actividadesDAO();
  $asignacionDAO = new asignacionDAO();

  if ($_SESSION['id_rol']==3) {
    if(empty($_POST['n'])){
      zonaSeguraDentro();
    }
    $idpractica = $_POST['n'];
    switch ($_SESSION['id_rol']) {
      case 3:
        if (!empty($_POST['opc'])) {
          //echo 'Pase!!';
          switch ($_POST['opc']) {
            case 1:
              $asignacionClass = new asignacionClass();
              $actividad = $_POST['actividad'];
              $fechaini = $_POST['fechaini'];
              $fechafin = $_POST['fechafin'];
              $estado = $_POST['estado'];
              $asignacionClass->setId_actividad($actividad);
              $asignacionClass->setFecha_ini($fechaini);
              $asignacionClass->setFecha_fin($fechafin);
              $asignacionClass->setId_estado($estado);
              $asignacionClass->setId_practica($idpractica);
              $asignacionDAO->create($asignacionClass);

              break;

            default:
              # code...
              break;
          }
        }

        include('./menus/m_asesor.php');
  ?>

        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <h1 class="text-center">Asignación de actividades</h1>
          <h2 class="text-center">Practica #<?php echo  $idpractica; ?></h2><br>

          <div class="row container-fluid">
            <form class="row row-cols-lg-auto g-3 align-items-center" name="registroAsignacion" action="" method="POST">
              <div class="col-12">
                <label class="visually-hidden" for="inlineFormSelectActividad">Actividad</label>
                  <?php $actividadDAO->selectActividades($_SESSION['id_usuario']);?>   
              </div>

              <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputFechaini">Fecha inicio</label>
                <input type="date" class="form-select" id="inlineFormInput" name="fechaini" required>
              </div>

              <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputFechafin">Fecha final</label>
                <input type="date" class="form-select" id="inlineFormInput" name="fechafin" required>
              </div>
              <div class="col-12">
                <label class="visually-hidden" for="inlineFormSelectEstado">Estado</label>
                <select name="estado" id="inlineFormSelectEstado" class="form-select" required>
                  <option value="">Elija una...</option>
                  <option value="1">Activa</option>
                  <option value="2">Inactiva</option>
                </select>
              </div>
              <input value="1" name="opc" type="hidden">
              <input value="<?php echo $idpractica; ?>" name="n" type="hidden">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
              </div>
            </form>

            <div class='table table-responsive'>
              <?php
              echo '<br>';
              $asignacionDAO->listarActividadesAsignadas($idpractica);
              ?>
            </div>

          </div>
          <!---------------------------------------------------------------->
          </div>


          <?php include('./menus/footer.php');   ?>
        </section>

  <?php
        break;

      default:
        echo 'Área restringida';
        header("Location: dashboard.php");
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