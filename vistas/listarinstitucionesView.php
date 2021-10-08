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
    <title>PracSys - Lista de Instituciones</title>

</head>

<body>
    <?php
    session_start();
    include '../class/classDAO/institucionDAO.php';
    include_once '../class/classDAO/tiempo.php';
    $institucionesDAO = new institucionDAO();
    $institucionesOBJ = new institucionClass();


    if (!empty($_SESSION['id_rol'])) {
        switch ($_SESSION['id_rol']) {
            case 1:
                include 'menus/m_admin.php';
                break;
            case 2:
                include 'menus/m_cordi.php';
                break;
            case 3:
                include 'menus/m_asesor.php';
                break;
            default:
                header('Location:../vistas/dashboard.php');
                break;
        }

        if (!empty($_POST['opc'])) {
            $nom_institucion = $_POST['nom_institucion'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $nom_rector = $_POST['nom_rector'];
            date_default_timezone_set("America/Bogota");
            $fecha = strftime("%Y-%m-%d %H:%M:%S", time());

            $institucionesOBJ->setNom_institucion($nom_institucion);
            $institucionesOBJ->setDireccion($direccion);
            $institucionesOBJ->setTelefono($telefono);
            $institucionesOBJ->setNom_rector($nom_rector);
            $institucionesOBJ->setFecha($fecha);

            switch ($_POST['opc']) {
                case 1:
                    $institucionesDAO->create($institucionesOBJ);
                    break;
                case 2:
                    $institucionesDAO->create($institucionesOBJ);
                    break;
            }
        }

    ?>
        <section class="home-section">
            <?php include_once 'menus/header.php'; ?>
            <div class="row container-fluid">
                <h2 class="text-center">Instituciones/Organizaciones</h2>
                <br>
                <br>
                <br>
                <div class="col-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevainstitucion" style="background-color:#16697a">
                        <i class="bi bi-plus-square"></i> Añadir Institución
                    </button>
                </div>
                <br><br>
                <div class="modal fade" id="anadirnuevainstitucion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                            <label for="nom_institucion" class="form-label small">Nombre Institución</label>
                                            <input type="text" class="form-control" name="nom_institucion" id="nom_institucion" placeholder="Nombre de institución" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="direccion" class="form-label small">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="telefono" class="form-label small">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono" required>

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="nom_rector" class="form-label small">Nombre del rector(a)</label>
                                            <input type="text" class="form-control" id="nom_rector" name="nom_rector" placeholder="Nombre rector(a)" required>

                                        </div>
                                    </div>
                                    <input type="hidden" value="1" name="opc">
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-sm" style="background-color: #0c2233; color:white">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <?php
                    
                    $institucionesDAO->show();

                    ?>

                </div>
               
            </div>
<br> <br>
                <br>
                <br>
            <?php include 'menus/footer.php'; ?>
        </section>
        <script src="js/scriptBusqueda.js"></script>
        <?php include_once 'menus/scriptsFinales.php'; ?>

    <?php
    
    } else {
        zonaSegura();
    }

    ?>

</body>

</html>