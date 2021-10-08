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
    <title>PracSys - Programas</title>

</head>

<body>
    <?php
    session_start();
    include '../class/classDAO/programaDAO.php';
    include_once '../class/classDAO/tiempo.php';

    $progOBJ = new programaDAO();
    $id_rol = $_SESSION['id_rol'];
    if (!empty($_SESSION['id_usuario'])) {
        switch ($id_rol) {
            case 1:
                include 'menus/m_admin.php';
                break;
            default:
                header('Location:../vistas/dashboard.php');
                break;
        }
        if (!empty($_POST['opc'])) {
        }





    ?>
        <section class="home-section">
            <?php include_once 'menus/header.php'; ?>
            <div class="row container-fluid">
                <div class="col-3">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modificarnuevainstitucion" . $row[" id_prog"] . "" style="background-color:#16697a"><i class="bi bi-pencil"></i> Programa</button>
                <div class="modal fade" id="modificarnuevainstitucion" . $row["id_prog"] . "" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-square"></i> Añadir Institución</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" name="formulario_registro">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="programa" class="form-label small">Nombre programa</label>
                                            <input type="text" class="form-control" name="nom_institucion" id="programa" placeholder="Nombre de programa" value="" . $row["programa"] . "" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="area" class="form-label small">Área</label>
                                            <input type="text" class="form-control" id="area" name="direccion" placeholder="Área" value="" . $row["area"] . "" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="logo" class="form-label small">Logo</label>
                                            <input type="text" class="form-control" id="logo" name="telefono" placeholder="Logo" value="" . $row["logo"] . "" required>
                                        </div>
                                    </div>
                                    <input type="hidden" value="2" name="opc">
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Modificar</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                               </form>
                        </div>
                    </div>
                </div>   
                </div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3"></div>    
                
                <br>
                <?php $progOBJ->show(); ?>
            
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