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

  <title>Reportes Asesores</title>
</head>

<body>
  <?php

  session_start();
  include '../class/classDAO/usuariosDAO.php';
  include_once '../class/classDAO/tiempo.php';
  ?>
  <?php include 'menus/m_asesor.php'; ?>
  <section class="home-section">
    <?php include_once 'menus/header.php'; ?>
    <div class="row container-fluid">
      <ul class="nav nav-tabs" id="tabasesor" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Estudiantes</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="calificaciones-tab" data-bs-toggle="tab" data-bs-target="#calificaciones" type="button" role="tab" aria-controls="calificaciones" aria-selected="true">calificaciones</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="actividades-tab" data-bs-toggle="tab" data-bs-target="#actividades" type="button" role="tab" aria-controls="actividades" aria-selected="true">Actividades</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="asesores2-tab" data-bs-toggle="tab" data-bs-target="#asesores2" type="button" role="tab" aria-controls="asesores2" aria-selected="false">Asesores</button>
        </li>

      </ul>
      <div class="tab-content" id="tabasesor">
        <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
          <h2 class="text-center">Reportes</h2>
          <div class="row container-fluid">

            <p> Seleccione el reporte que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

          </div>
        </div>
        <br>

        <div style="text-align: center;">
          <h2> Reporte general de estudiantes </h2>
        </div>
        <br>
        <div>
          <select id="id_estudiante" class="form-select" name="id_estudiante" style="width: 600px;">
            <option selected>Escoja la practica deseada</option>
            <option value="1">PRACTICA A 2021</option>
            <option value="2">PRACTICA B 2022</option>
            <option value="3">PRACTICA C 2022</option>
          </select><br>
        </div>
        <div style="text-align: center;">
          <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

        </div>
        <div style="text-align: center;">
          <h2> Reporte de practicantes por año</h2>
        </div>
        <br>
        <div>
          <select id="id_estudiante" class="form-select" name="id_estudiante" style="width: 600px;">
            <option selected>Escoja el periodo seleccionado</option>
            <option value="1">PRACTICA A 2021</option>
            <option value="2">PRACTICA B 2022</option>
            <option value="3">PRACTICA C 202</option>
          </select><br>
        </div>
        <div style="text-align: center;">
          <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

        </div>

        

        
        <div class="tab-pane show fade active" id="calificaciones" role="tabpanel" aria-labelledby="calificaciones-tab">
          <br>
          <h2 class="text-center">Reporte de Calificaciones por estudiante</h2>
          <div>
            <p> Seleccione el reporte de calificaciones que desee descargar, recuerde que el archivo se descargará en formato PDF </p>

          </div>

          <div>
            <select id="id_estudiante" class="form-select" name="id_estudiante" style="width: 600px;">
              <option selected>Escoja el periodo seleccionado</option>
              <option value="1">PRACTICA A 2021</option>
              <option value="2">PRACTICA B 2022</option>
              <option value="3">PRACTICA C 2023</option>
            </select><br>
          </div>
          <div style="text-align: center;">
            <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Descargar</button>

          </div>
        </div>

        <div class="tab-pane show fade active" id="actividades" role="tabpanel" aria-labelledby="actividades-tab">
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
</body>

</html>