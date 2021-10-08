<?php 
  include '../class/classDAO/usuariosDAO.php';
  if(!empty($_POST['id'])){
    $id=$_POST['id'];
    $pass=$_POST['pass'];
    $usuarioDAO= new usuariosDAO();
    $usuarioDAO->iniciarSesion($id,$pass);

  }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PracSys - Login</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <style>
      body{
        background: #ffe259;
        background:linear-gradient(to right, #ffa751, #ffe275);
      }
    .bg{
     background-image: url(img/Pracsysdefinitivo_red_med.png);
     background-position: center;
     background-repeat: no-repeat;
     background-color: white;
    }
  </style>
  
</head>
<body>
  <div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row align-items-stretch">
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
      </div>
      <div class="col  p-5 rounded-end" style="background-color: #16697a;">
        <div class="container">
        </div>
        <h2 class="fw-bold text-center py-5" style="color: whitesmoke;"> Bienvenid@s </h2>
        <!--- LOGIN --->
        <form action="" method="post" name="ingreso">
          <div class=" input-group mb-4">
            <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          </svg>
          </span>
            <input type="cod_usu" class="form-control" name="id" id="id" placeholder="Documento de identificación">
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
          </svg>
            </span>
            <input type="pass" class="form-control" name="pass" id="pass" placeholder="Contraseña">
          </div>
          <div class="mb-4 form-check">
            <input type="checkbox" name="connected " class="form-check-input">
            <label for="connected" class="form-check-label" style="font-family: Arial, Helvetica, sans-serif; color: whitesmoke;"> Mantenerme Conectado</label>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary" > Iniciar sesión </button>
          </div>
          <div class="my-3">
            <span style="font-family: Arial, Helvetica, sans-serif; color: white;"> No tiene cuenta? <a href="#" style="color: white;">Registrate</a></span><br>
            <span> <a href="recuperarcontraseñaView.php" style="color: whitesmoke;">Recuperar Contraseña</a></span>
          </div>
        </form>
        <!--- Burbujas --->
        <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
        </div>
      </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
            $(document).ready(function () {
                $('.toast').toast('show')
            });
    </script>
</body>
</html>