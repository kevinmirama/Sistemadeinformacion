<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/sweetalert2.all.min.js"></script>
  <title>PracSys - RecuperarContraseña</title>
   <link rel="stylesheet" href="css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <style>
      body{
        background: #ffe259;
        background:linear-gradient(to right, #ffa751, #ffe259);
      }
    .bg{
    background-image: url(img/Pracsysdefinitivo2.png);
     width: 534,5;
     background-position: center center;
     
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
        <h2 class="fw-bold text-center py-5" style="color: whitesmoke;"> Recuperar Contraseña </h2>
        <!--- LOGIN --->

        <span id="aviso1" class="text-success text-bold" > texto</span>
        <span id="aviso" class="text-danger text-bold" > texto</span>
        <form id="form-recuperar" action="enviar.php" method="post">
          <div class=" input-group mb-4">
            <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
            </svg>
          </span>
            <input type="email_usurecuperar" class="form-control" name="email_usurecuperar" id="email_usurecuperar" placeholder="Correo Electrónico">
          </div>
          <p style="font-family: Arial, Helvetica, sans-serif; color:white">Ingrese la dirección de correo electrónico asociada a su cuenta. Recibirás un email con instrucciones para reiniciar tu contraseña en unos minutos.</p>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary"> Recuperar Contraseña </button>
          </div>
        </form>
      </div>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/recuperar.js"></script>
</html>