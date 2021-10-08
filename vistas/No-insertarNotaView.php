<?php

include './class/classDAO/notasDAO.php';

if (!empty($_POST['id_nota'])) {

    $id_nota = $_POST['id_nota'];
    $archivo_entrega = $_POST['archivo_entrega'];
    $calificacion = $_POST['calificacion'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $fecha_calificacion = $_POST['fecha_calificacion'];
    $observacion = $_POST['observacion'];
    $id_usupractica = $_POST['id_usupractica'];
    $id_asignacion = $_POST['id_asignacion'];

    $notasOBJ = new notasClass();
    $notasOBJ->setId_nota('id_nota');
    $notasOBJ->setArchivo_entrega('archivo_entrega');
    $notasOBJ->setCalificacion('calificacion');
    $notasOBJ->setFecha_entrega('fecha_entrega');
    $notasOBJ->setFecha_calificacion('fecha_calificacion');
    $notasOBJ->setObservacion('observacion');
    $notasOBJ->setId_usupractica('id_usupractica');
    $notasOBJ->setId_asignacion('id_asignacion');


    $notasDAO = new notasDAO();
    $notasDAO->create($notasOBJ);
}
?>

<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>PracSys - RegistrarNotas</title>
</head>

<body>
    <div class="container-md">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>Registro de Notas</h1>
        </div>

        <form class="row g-3">
            <div class="col-md-3">
                <label for="id_nota" class="form-label">Id Nota </label>
                <input type="text" class="form-control" id="id_nota" name="id_nota">
            </div>
            <div class="col-md-3">
                <label for="archivo_entrega" class="form-label">Archivo entrega </label>
                <input type="text" class="form-control" id="archivo_entrega" name="archivo_entrega">
            </div>
            <div class="col-md-3">
                <label for="calificacion" class="form-label">Calificacion </label>
                <input type="text" class="form-control" id="calificacion" name="calificacion">
            </div>
            <div class="col-3">
                <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
                <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega">
            </div>
            <div class="col-md-3">
                <label for="fecha_calificacion" class="form-label">Fecha de Calificación</label>
                <input type="date" class="form-control" id="fecha_calificacion" name="fecha_calificacion">
            </div>
            <div class="col-md-4">
                <label for="observacion" class="form-label">Observación</label>
                <input type="text" class="form-control" id="observacion" name="observacion">
            </div>
            <div class="col-md-4">
                <label for="id_usupractica" class="form-label"> Id Usu práctica</label>
                <input type="number" class="form-control" id="id_usupractica" name="id_usupractica">
            </div>
            <div class="col-md-4">
                <label for="id_asignacion" class="form-label"> Id asignación</label>
                <input type="number" class="form-control" id="id_asignacion" name="id_asignacion">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->


    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
</body>
</html>