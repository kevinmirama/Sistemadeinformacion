<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="js/scriptClicDerecho.js"></script>
  <link rel="stylesheet" href="css/estilodashboard.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Iconos de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="js/sweetalert2.all.min.js"></script>
  <title>PracSys - Perfil</title>

</head>

<body>
  <?php
  session_start();
  include '../class/classDAO/usuariosDAO.php';
  include_once '../class/classDAO/tiempo.php';
  
  $usuOBJ = new usuariosDAO();
  if (!empty($_POST['id_usu'])) {
    $nombre = $_POST['nom_usu'];
    $apellido = $_POST['ape_usu'];
    if(!empty($_POST['pass_usu'])){
      $pass = $_POST['pass_usu'];
    } else{
      $pass = $_POST['p1u'];
    }
    $telefono = $_POST['tel_usu'];
    $email = $_POST['email_usu'];
    $codusu=$_POST['cod_usu'];
    $id_usu=$_SESSION['id_usuario'];
    $id_genero=$_POST['id_genero'];
    $perfilOBJ = new usuariosClass();
    $perfilOBJ->setId_usu($id_usu);
    $perfilOBJ->setId_genero($id_genero);
    $perfilOBJ->setId_rol($_SESSION['id_rol']);
    $perfilOBJ->setId_prog($_SESSION['id_prog']);
    $perfilOBJ->setId_estado(1);
    $perfilOBJ->setCod_usu($codusu);
    $perfilOBJ->setNom_usu($nombre);
    $perfilOBJ->setApe_usu($apellido);
    $perfilOBJ->setPass_usu($pass);
    $perfilOBJ->setEmail_usu($email);
    $perfilOBJ->setTel_usu($telefono);
    $usuOBJ->update($perfilOBJ, $_SESSION['id_usuario']);
  }

  $row = $usuOBJ->info($_SESSION['id_usuario']);
  $nom_usu = $_SESSION['nombre_usuario'];
  $id_rol = $_SESSION['id_rol'];
  $rol = $_SESSION['rol'];
  $id_usu = $_SESSION['id_usuario'];
  $programa =  $_SESSION['id_prog'];
  $logo = $_SESSION['logo'];
  $programa = $_SESSION['programa'];

  if (!empty($_SESSION['id_usuario'])) {
    switch ($id_rol) {
      case 1:
        include 'menus/m_admin.php';
        break;
      case 2:
        include 'menus/m_cordi.php';
        break;
      case 3:
        include 'menus/m_asesor.php';
        break;
      case 4:
        include 'menus/m_estudi.php';
        break;
      case 5:
        include 'menus/m_titular.php';
        break;
    }

  ?>
    <section class="home-section">
      <?php include_once 'menus/header.php'; ?>
      <div class="row container-fluid">
        <form action="" method="POST" name="formulario_perfil">
          <h2 style="text-align: center;">Actualice sus datos</h2><br>
          <div class="row">
            <div class="col-sm-2">
              <label for="id_usu" class="form-label small"> Identificación</label><br>
              <input type="text" class="form-control"  name="id_usu" id="id_usu" value="<?php echo $id_usu; ?>">
            </div>
            <div class="col-sm-2">
              <label for="cod_usu" class="form-label small">Código</label>
              <input type="text" name="cod_usu" id="cod_usu" class="form-control" value="<?php echo $row['cod_usu']; ?>" required>
            </div>
            <div class="col-sm-4">
              <label for="nom_usu" class="form-label small">Nombres</label>
              <input type="text" name="nom_usu" id="nom_usu" class="form-control" value="<?php echo $row['nom_usu']; ?>" required>
            </div>
            <div class="col-sm-4">
              <label for="ape_usu" class="form-label small">Apellidos</label>
              <input type="text" name="ape_usu" id="ape_usu" class="form-control" value="<?php echo $row['ape_usu']; ?>" required>
            </div>
            <div class="col-sm-3">
              <label for="tel_usu" class="form-label small">Teléfono</label>
              <input type="text" name="tel_usu" id="tel_usu" class="form-control" value="<?php echo $row['tel_usu']; ?>" required>
            </div>
            <div class="col-sm-3">
              <label for="pass_usu" class="form-label small">Contraseña nueva</label>
              <input type="text" name="pass_usu" id="pass_usu" class="form-control" placeholder="Contraseña nueva">
            </div>
            <div class="col-sm-3">
              <label for="email_usu" class="form-label small">Email</label>
              <input type="email" name="email_usu" id="tel_usu" class="form-control" value="<?php echo $row['email_usu']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="id_genero" class="form-label">Género</label>
              <select id="id_genero" class="form-select" name="id_genero" required>
                <?php 
                  if($row['id_genero']==1){ ?>
                      <option>Escoja uno...</option>
                      <option value="1" selected>Masculino</option>
                      <option value="2">Femenino</option>
                      <option value="3">Otro</option>
                <?php
                  }elseif($row['id_genero']==2){ ?>
                    <option>Escoja uno...</option>
                    <option value="1">Masculino</option>
                    <option value="2" selected>Femenino</option>
                    <option value="3">Otro</option>
              <?php
                  }else{ ?> 
                    <option>Escoja uno...</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3" selected>Otro</option>
              <?php
                }
                ?>
                
              </select>
            </div>
          </div>
          <br>
          <input type="hidden" name="p1u" value="<?php echo $row['pass_usu']; ?>">
          <div class="text-center"><button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Actualizar</button></div>
        </form>
      </div>

      <?php include 'menus/footer.php'; ?>
    </section>

  <?php
  } else {
    zonaSegura();
  }


  include 'menus/scriptsFinales.php';

  ?>
</body>

</html>