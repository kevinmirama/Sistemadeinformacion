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

    <title>Reportesestudiantes</title>
</head>

<body>
    <?php

    session_start();
    ?>
    <?php include 'menus/m_estudi.php'; ?>
    <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
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

</body>

</html>