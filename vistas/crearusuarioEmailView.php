<?php

include '../class/classDAO/usuariosDAO.php';

if (!empty($_POST['id_usu'])) {

    $id_usu = $_POST['id_usu'];
    $cod_usu = $_POST['cod_usu'];
    $nom_usu = $_POST['nom_usu'];
    $ape_usu = $_POST['ape_usu'];
    $tel_usu = $_POST['tel_usu'];
    $email_usu = $_POST['email_usu'];
    $pass_usu = $_POST['id_usu'];
    $id_genero = $_POST['id_genero'];
    $id_estado = 1;
    $id_rol = 1;

    $usuariosOBJ = new usuariosClass();
    $usuariosOBJ->setId_usu($id_usu);
    $usuariosOBJ->setCod_usu($cod_usu);
    $usuariosOBJ->setNom_usu($nom_usu);
    $usuariosOBJ->setApe_usu($ape_usu);
    $usuariosOBJ->setTel_usu($tel_usu);
    $usuariosOBJ->setEmail_usu($email_usu);
    $usuariosOBJ->setPass_usu($pass_usu);
    $usuariosOBJ->setId_genero($id_genero);
    $usuariosOBJ->setId_estado($id_estado);
    $usuariosOBJ->setId_rol($id_rol);

    $usuariosDAO = new usuariosDAO();
    $usuariosDAO->create($usuariosOBJ);
} elseif (!empty($_GET['id'])) {


?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.0.min.js"></script>

        <title>PracSys - Registro de Usuarios</title>
    </head>

    <body style="background-color: #ffc045;">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded" style="position:relative; margin-top: 100px; left:auto">

            <h1 class="text-center">Registra tus datos</h1>
            <br>
            <hr>
            <form class="container row g-3" action="" method="post">
                <div class="col-md-6">
                    <label for="id_usu" class="form-label">Documento de Identificación</label>
                    <input type="text" class="form-control" id="id_usu" name="id_usu" value="<?php echo $_GET['id']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="cod_usu" class="form-label">Código</label>
                    <input type="text" class="form-control" id="cod_usu" name="cod_usu">
                </div>
                <div class="col-md-6">
                    <label for="nom_usu" class="form-label">Nombre </label>
                    <input type="text" class="form-control" id="nom_usu" name="nom_usu">
                </div>
                <div class="col-6">
                    <label for="ape_usu" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="ape_usu" name="ape_usu">
                </div>
                <div class="col-md-3">
                    <label for="tel_usu" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="tel_usu" name="tel_usu">
                </div>
                <div class="col-md-5">
                    <label for="email_usu" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email_usu" name="email_usu">
                </div>

                <div class="col-md-4">
                    <label for="id_genero" class="form-label">Género</label>
                    <select id="id_genero" class="form-select" name="id_genero">
                        <option selected>Escoja...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                        <option value="3">Otro</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="pass_usu" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass_usu" name="pass_usu">
                </div>
                <div class="col-md-6">
                    <label for="pass_usu2" class="form-label">Confirma Password</label>
                    <input type="password" class="form-control" id="pass_usu2" name="pass_usu2" onKeyup="pass()">
                    <label class="small" id="correcto" style="color:green">Password confirmada</label>
                    <label class="small" id="incorrecto" style="color:red">Password distintas</label>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->
        <script src="js/scriptClicDerecho.js"></script>
        <script type="text/javascript">
            document.getElementById('correcto').style.display = 'none';
            document.getElementById('incorrecto').style.display = 'none';

            function pass() {
                var p1 = documento.getElementById('pass_usu');
                var p2 = documento.getElementById('pass_usu2');
                if (p1 == p2) {
                    document.getElementById('correcto').style.display = 'block';
                    document.getElementById('incorrecto').style.display = 'none';
                } else {
                    document.getElementById('incorrecto').style.display = 'block';
                    document.getElementById('correcto').style.display = 'none';
                }
            }
        </script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->

    <?php
} else {
    echo "No ingresaste de la manera correcta!!";
    echo '<meta http-equiv="refresh" content="3;url=index.php">';
}

    ?>
    </body>

    </html>