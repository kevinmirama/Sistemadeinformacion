<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>Bienvenidos - PracSys </title>
    <link rel="stylesheet" href="css/styles2.css" />
  </head>
  <body>
<?php
    session_start();
    include_once '../class/classDAO/funciones.php';
    if (!empty($_SESSION['id_usuario'])) {
      ?>
      <div class="container">
      <span style="--l: 'P';">P</span>
      <span style="--l: 'r';">r</span>
      <span style="--l: 'a';">a</span>
      <span style="--l: 'c';">c</span>
      <span style="--l: 'S';">S</span>
      <span style="--l: 'y';">y</span>
      <span style="--l: 'S';">S</span>
      <meta http-equiv="refresh" content="3;url=dashboard.php">   
    </div>
      <?php 


    }
    else{
      zonaSegura2();
    }
?>
    
  </body>
</html>
