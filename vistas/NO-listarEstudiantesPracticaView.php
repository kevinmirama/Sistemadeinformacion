<?php

session_start();
include '../class/classDAO/usuariosDAO.php';
$usuariosDAO = new usuariosDAO();
if (!empty($_POST['id_usu'])) {

  $id_usu = $_POST['id_usu'];
  $cod_usu = $_POST['cod_usu'];
  $nom_usu = $_POST['nom_usu'];
  $ape_usu = $_POST['ape_usu'];
  $tel_usu = $_POST['tel_usu'];
  $email_usu = $_POST['email_usu'];
  $pass_usu = $_POST['id_usu'];
  $id_genero = $_POST['id_genero'];
  $id_programa = $_POST['id_programa'];
  $id_estado = 1;
  $id_rol = 1;
  $passEncrip = password_hash($pass_usu, PASSWORD_DEFAULT);
  $usuariosOBJ = new usuariosClass();
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
?>


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
  <link rel="stylesheet" href="css/frasealeatoria.css">
  <script src="js/sweetalert2.all.min.js"></script>
  <title>PracSys - Lista de Estudiantes</title>
</head>

<body>
  <?php include('./menus/m_asesor_2.php'); ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $_SESSION['rol'] . " " . $_SESSION['nombre_usuario']; ?></span>
      </div>
      <div class="profile-details">
        <img src="<?php echo $_SESSION['logo']; ?>" alt="">
        <span class="admin_name"><?php echo $_SESSION['programa']; ?></span>
      </div>
    </nav>
    <br><br><br><br>
    <h1 class="text-center">Estudiantes de la práctica</h1>
    <h2 class="text-center">XXXX</h2>

    <div class="row container-fluid">
      <!---------------------------------------------------------------->

      <!-- Button  -->
      <div class="col-sm-3">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevousuario" style="background-color:#16697a">
          <i class="bi bi-plus-square"></i>  Nuevo Estudiante

        </button>
      </div><br><br>
      <!-- Modal -->
      <div class="modal fade" id="anadirnuevousuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <label for="id_genero" class="form-label small">Identificación Usuario</label>
                    <input type="text" name="id_usu" id="id_usu" class="form-control" placeholder="Identificación de Usuario" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="id_genero" class="form-label small">Nombre de usuario</label>
                    <input type="text" name="nom_usu" id="nom_usu" class="form-control" placeholder="Nombre de Usuario" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="id_genero" class="form-label small">Apellido de Usuario</label>
                    <input type="text" name="ape_usu" id="ape_usu" class="form-control" placeholder="Apellido de Usuarior" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="id_genero" class="form-label small">Codigo de usuario</label>
                    <input type="text" name="cod_usu" id="cod_usu" class="form-control" placeholder="Codigo de usuario" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="id_genero" class="form-label small">Teléfono de Usuario</label>
                    <input type="text" name="tel_usu" id="tel_usu" class="form-control" placeholder=" Telefono de Usuario" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="id_genero" class="form-label small">Email de Usuario</label>
                    <input type="text" name="email_usu" id="email_usu" class="form-control" placeholder=" Email de Usuario" required>
                  </div>
                  <div class="col-md-6">
                    <label for="id_genero" class="form-label small">Género</label>
                    <select id="id_genero" class="form-select" name="id_genero">
                      <option selected>Seleccione uno...</option>
                      <option value="1">Masculino</option>
                      <option value="2">Femenino</option>
                      <option value="3">Otro</option>
                    </select><br>
                  </div>
                  <div class="col-md-6">
                    <label for="id_prog" class="form-label small">Programa</label>
                    <select id="id_prog" class="form-select" name="id_prog">
                      <option selected>Seleccione el programa</option>
                      <option value="1">Licenciatura en Español e Inglés</option>
                      <option value="2">Licenciatura en Informática</option>
                      <option value="3">Licenciatura en Matemáticas</option>
                      <option value="4">Licenciatura en Filosofía y Letras</option>
                      <option value="5">Licenciatura en Artes Visualesa</option>
                      <option value="6">Licenciatura en Música</option>
                      <option value="7">Licenciatura en Ciencias Sociales</option>
                      <option value="8">Licenciatura en Educación básica con énfasis en Ciencias naturales</option>
                      <option value="9">Licenciatura en Lengua Castellana y Literatura</option>
                      <option value="10">Licenciatura en Ingles y frances</option>
                    </select><br>
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

      <!---------------------------------------------------------------->
    </div>

    <div class='table table-responsive'>
      <?php
      $id_practica = 10;
      $usuariosDAO->listarEstudiantes($id_practica);
      ?>
    </div>
    <!--<figure>
      <blockquote class="frase"></blockquote>
      <figcaption class="autor"></figcaption>
    </figure> -->

    <?php include('./menus/footer.php');   ?>
  </section>



  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/frasealeatoria.js"></script>
  <script>
    $(document).ready(function() {
      $('.toast').toast('show')
    });
  </script>

</body>

</html>