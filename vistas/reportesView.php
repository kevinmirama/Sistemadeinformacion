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

  <title>PracSys - Lista de Estudiantes</title>
</head>

<body>
  <?php

  session_start();
  include '../class/classDAO/usuariosDAO.php';
  include_once '../class/classDAO/tiempo.php';
  if (!empty($_SESSION['id_usuario'])) {
    switch ($_SESSION['id_rol']) {
      case 1:
  ?>
TODO LO DEL ADMINISTRADOR
<?php include 'menus/m_admin.php'; ?>

<section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabCoor2" role="tablist"> 
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="false">Estudiantes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="instituciones-tab" data-bs-toggle="tab" data-bs-target="#instituciones" type="button" role="tab" aria-controls="instituciones" aria-selected="false">Instituciones</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="asesores-tab" data-bs-toggle="tab" data-bs-target="#asesores" type="button" role="tab" aria-controls="asesores" aria-selected="false">Asesores</button>
              </li>
            </ul>
            <div class="tab-content" id="tabCoor">
              <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <h2 class="text-center">Reportes</h2>
                <p> Seleccione el reporte de estudiantes matriculados, recuerde elegir el periodo academico deseado, el archivo se descargará en formato PDF </p>
                <div style="text-align: center;">
                  <h4> Estudiantes </h4>
                </div>
                <br>
                <select id="id_estudiante" class="form-select" name="id_estudiante" style="width: 600px;">
                  <option selected>Escoja la practica deseada</option>
                  <option value="1">PRACTICA A 2021</option>
                  <option value="2">PRACTICA B 2022</option>
                  <option value="3">PRACTICA C 2022</option>
                </select>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>
                </div>

              </div>
              <div class="tab-pane fade" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <br>
                <h2 class="text-center">Estudiantes del programa</h2>
                <h2 class="text-center">Reportes de estudiantes por practica</h2>
                <div>
                  <p> Seleccione el reporte de estudiantes que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la practica deseada</option>
                    <option value="1">PRACTICA A 2021</option>
                    <option value="2">PRACTICA B 2022</option>
                    <option value="3">PRACTICA C 2022</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="instituciones" role="tabpanel" aria-labelledby="instituciones-tab">
                <br>
                <h2 class="text-center">Instituciones</h2>
                <h2 class="text-center">Reportes de estudiantes por practica</h2>
                <div>
                  <p> Seleccione el reporte de instituciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la institucion Deseada deseada</option>
                    <option value="1">I.E.M San Jose bethlemitas</option>
                    <option value="2">I.E.M Mercedario</option>
                    <option value="3">I.E.M INEM</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="asesores" role="tabpanel" aria-labelledby="asesores-tab">
                <br>
                <h2 class="text-center">Asesores</h2>
                <h2 class="text-center">Reportes de asesores por practica</h2>
                <div>
                  <p> Seleccione el reporte de instituciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la institucion Deseada deseada</option>
                    <option value="1">I.E.M San Jose bethlemitas</option>
                    <option value="2">I.E.M Mercedario</option>
                    <option value="3">I.E.M INEM</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>



      <?php
        break;
      case 2:
      ?>
        <?php include 'menus/m_cordi.php'; ?>
        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabCoor2" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="practicas-tab" data-bs-toggle="tab" data-bs-target="#practicas" type="button" role="tab" aria-controls="practicas" aria-selected="true">Practicas</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="false">Estudiantes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="instituciones-tab" data-bs-toggle="tab" data-bs-target="#instituciones" type="button" role="tab" aria-controls="instituciones" aria-selected="false">Instituciones</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="asesores-tab" data-bs-toggle="tab" data-bs-target="#asesores" type="button" role="tab" aria-controls="asesores" aria-selected="false">Asesores</button>
              </li>
            </ul>
            <div class="tab-content" id="tabCoor">
              <div class="tab-pane fade show active" id="practicas" role="tabpanel" aria-labelledby="practicas-tab">
                <h2 class="text-center">Reportes</h2>
                <p> Seleccione el reporte de practicas activas o inactivas que desee descargar, recuerde elegir el periodo academico deseado y recuerde que el archivo se descargará en formato PDF </p>
                <div style="text-align: center;">
                  <h4> Practicas </h4>
                </div>
                <br>
                <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                  <option selected>Escoja la practica deseada</option>
                  <option value="1">PRACTICA A 2021</option>
                  <option value="2">PRACTICA B 2022</option>
                  <option value="3">PRACTICA C 2022</option>
                </select>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>
                </div>

              </div>
              <div class="tab-pane fade" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <br>
                <h2 class="text-center">Estudiantes del programa</h2>
                <h2 class="text-center">Reportes de estudiantes por practica</h2>
                <div>
                  <p> Seleccione el reporte de estudiantes que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la practica deseada</option>
                    <option value="1">PRACTICA A 2021</option>
                    <option value="2">PRACTICA B 2022</option>
                    <option value="3">PRACTICA C 2022</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="instituciones" role="tabpanel" aria-labelledby="instituciones-tab">
                <br>
                <h2 class="text-center">Instituciones</h2>
                <h2 class="text-center">Reportes de estudiantes por practica</h2>
                <div>
                  <p> Seleccione el reporte de instituciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la institucion Deseada deseada</option>
                    <option value="1">I.E.M San Jose bethlemitas</option>
                    <option value="2">I.E.M Mercedario</option>
                    <option value="3">I.E.M INEM</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="asesores" role="tabpanel" aria-labelledby="asesores-tab">
                <br>
                <h2 class="text-center">Asesores</h2>
                <h2 class="text-center">Reportes de asesores por practica</h2>
                <div>
                  <p> Seleccione el reporte de instituciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja la institucion Deseada deseada</option>
                    <option value="1">I.E.M San Jose bethlemitas</option>
                    <option value="2">I.E.M Mercedario</option>
                    <option value="3">I.E.M INEM</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>

      <?php
        break;
      case 3:
      ?>
    <?php include 'menus/m_asesor.php'; ?>
    <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <ul class="nav nav-tabs" id="tabCoor2" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Practicas</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="calificaciones-tab" data-bs-toggle="tab" data-bs-target="#calificaciones" type="button" role="tab" aria-controls="calificaciones" aria-selected="false">Calificaciones</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="actividades-tab" data-bs-toggle="tab" data-bs-target="#actividades" type="button" role="tab" aria-controls="actividades" aria-selected="false">Actividades</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="asesores-tab" data-bs-toggle="tab" data-bs-target="#asesores" type="button" role="tab" aria-controls="asesores" aria-selected="false">Asesores</button>
              </li>
            </ul>
            <div class="tab-content" id="tabCoor">
              <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <h2 class="text-center">estudiantes</h2>
                <p> Seleccione el reporte deseado, y recuerde que el archivo se descargará en formato PDF </p>
                <div style="text-align: center;">
                  <h4> Practicas </h4>
                </div>
                <br>
                <select id="id_estudiante" class="form-select" name="id_estudiante" style="width: 600px;">
                  <option selected>Escoja la practica deseada</option>
                  <option value="1">PRACTICA A 2021</option>
                  <option value="2">PRACTICA B 2022</option>
                  <option value="3">PRACTICA C 2022</option>
                </select>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>
                </div>

              </div>
              <div class="tab-pane fade" id="asesores" role="tabpanel" aria-labelledby="asesores-tab">
                <br>
                <h2 class="text-center">Asesores del programa</h2>
                <h2 class="text-center">Reportes de asesores general </h2>
                <div>
                  <p> Seleccione el reporte de asesores segun el periodo seleccionado, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_asesor" class="form-select" name="id_asesor" style="width: 600px;">
                    <option selected>Escoja la practica deseada</option>
                    <option value="1">PRACTICA A 2021</option>
                    <option value="2">PRACTICA B 2022</option>
                    <option value="3">PRACTICA C 2022</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="calificaciones" role="tabpanel" aria-labelledby="calificaciones-tab">
                <br>
                <h2 class="text-center">Calificcaciones</h2>
                <h2 class="text-center">Reportes de calificaciones por estudiante</h2>
                <div>
                  <p> Seleccione el reporte de calificaciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                    <option selected>Escoja el periodo de calificaciones </option>
                    <option value="1">PRACTICA A 2021</option>
                    <option value="2">PRACTICA B 2022</option>
                    <option value="3">PRACTICA C 2022</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
              <div class="tab-pane fade" id="actividades" role="tabpanel" aria-labelledby="actividades-tab">
                <br>
                <h2 class="text-center">Reporte de Asignación de actividades</h2>
                <div>
                  <p> Seleccione el reporte de asignaciones de actividades deseado, recuerde que el archivo se descargará en formato PDF </p>

                </div>

                <div>
                  <select id="id_asignacion" class="form-select" name="id_asignacion" style="width: 600px;">
                    <option selected>Escoja la practica seleccionada</option>
                    <option value="1">PRACTICA A 2021</option>
                    <option value="2">PRACTICA B 2022</option>
                    <option value="3">PRACTICA C 2022</option>
                  </select><br>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

                </div>
              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php
        break;
      case 4:
      ?>
      <?php include 'menus/m_estudi.php'; ?>

      <div class="row container-fluid" style="text-align: center;">
            <h1>Reporte de notas</h1>
            <p> Seleccione el reporte de notas hasta la fecha, recuerde elegir el periodo academico deseado y recuerde que el archivo se descargará en formato PDF </p>
        

        <div class="row container-fluid" style="text-align: center;">
            <select id="id_practica" class="form-select" name="id_practica" style="width: 600px;">
                <option selected>Escoja la practica deseada</option>
                <option value="1">PRACTICA A 2021</option>
                <option value="2">PRACTICA B 2022</option>
                <option value="3">PRACTICA C 2022</option>
            </select><br>

        </div>
        <br>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>
        </div>
    </div>





  <?php
        break;
    }
  } else {
    zonaSegura();
  }

  ?>

  <?php include_once 'menus/scriptsFinales.php'; ?>
</body>

</html>