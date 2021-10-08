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
    <title>PracSys - Actividades</title>
</head>

<body>
    <?php
    session_start();
    include '../class/classDAO/actividadesDAO.php';
    $actividadesDAO = new actividadesDAO();
    include '../class/classDAO/notasDAO.php';
    include '../class/classDAO/asignacionDAO.php';

    $notasOBJ = new notasClass();
    $notasDAO = new notasDAO();

    if (!empty($_SESSION['id_usuario'])) {

        switch ($_SESSION['id_rol']) {
            case 1:
                include 'menus/m_admin.php';
                break;
            case 2:
                include 'menus/m_cordi.php';
                break;
            case 3:
                if (!empty($_POST['opc'])) {

                    switch ($_POST['opc']) {
                        case 1:
                            $actividad = $_POST['actividad'];
                            $actividadesOBJ = new actividadesClass();
                            $nombreArchivo = $_FILES['archivo']['name'];
                            //echo $nombreArchivo;
                            if ($_FILES['archivo']['size'] != 0) {
                                $formatos = array('.jpg', '.png', '.zip', '.doc', '.docx', '.xml', '.pdf', '.pptx', '.rar');/* nextencione de archivos */
                                $nombreArchivo = $_FILES['archivo']['name'];/* nombre del archivo */
                                $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];/* nombre del archivo temporal */
                                $tamaño = $_FILES['archivo']['size'];
                                if ($tamaño <= 10485760) {
                                    $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));/* buscar la extension del archivo primero busca rn la cadena con substr y para     encontrar la posicion usa strrpos*/
                                    if (in_array($ext, $formatos))/* in array permite validar si algun elemento esta dentro del array tiene los formatos jpg, png y .zip */ {
                                        date_default_timezone_set("America/Bogota");
                                        $fecha = strftime("%Y%m%d%H%M%S", time());
                                        $nombreNuevo = "Act_" . $fecha . $ext;
                                        if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreNuevo"))
                                            if ($_FILES['archivo']['size']) {
                                                //echo "Archivo subio exitosamente";
                                                $bandSubida = "archivos/" . $nombreNuevo;
                                                $actividadesOBJ->setArchivo($bandSubida);
                                                $id_usu_creador = $_SESSION['id_usuario'];
                                                $actividadesOBJ->setActividad($actividad);
                                                $actividadesOBJ->setId_usu_creador($id_usu_creador);
                                                $actividadesDAO->create($actividadesOBJ);
                                            } else {
                                                mensajeError("Archivo no subido");
                                            }
                                    } else {
                                        mensajeError("Extensión no admitida");
                                    }/* fin else*/
                                } else {
                                    $msj = "El archivo es demasiado pesado, sobrepasa el límite de 10Mb <br> Tamaño de archivo: " . $tamaño;
                                    mensajeError($msj);
                                }
                            } else {
                                $bandSubida = "No";
                                $actividadesOBJ->setArchivo($bandSubida);
                                $id_usu_creador = $_SESSION['id_usuario'];
                                $actividadesOBJ->setActividad($actividad);
                                $actividadesOBJ->setId_usu_creador($id_usu_creador);
                                $actividadesDAO->create($actividadesOBJ);
                            }

                            break;
                        case 2:
                            $idactividad= $_POST['idactividad'];
                            $objAsignacion = new asignacionDAO();
                            $estaonoesta= $objAsignacion -> buscarActividad($idactividad);
                            //echo $estaonoesta;
                            if($estaonoesta==1){
                                //echo "No se puede eliminar la actividad";
                            }
                            else{
                                $actividadesDAO->delete($idactividad, $_POST['archivo']);

                            }
                            break;
                    }
                }


                include 'menus/m_asesor.php'; ?>
                <section class="home-section">
                    <?php include_once 'menus/header.php'; ?>
                    <h2 class="text-center">Gestión de actividades</h2><br>
                    <br>
                    <div class="row container-fluid">
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadiractividad" style="background-color:#16697a">
                                <i class="bi bi-plus-square"></i> Nueva actividad
                            </button>
                        </div><br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="anadiractividad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Nueva actividad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" class="" action="" method="POST" name="formulario_registro">
                                            <div class="row-mb-3">
                                                <div class="col">
                                                    <br>
                                                    <div class="col">
                                                        <label for="actividad" class="form-label">Detalle actividad</label>
                                                        <input type="text" name="actividad" id="actividad" class="form-control" placeholder="Detalle de la actividad" required>
                                                        <div class="invalid-feedback"></div>
                                                    </div><br>
                                                    <div class=" col form-check form-switch" onclick="aparece()">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault" onclick="aparece()">Anexar archivo para descargar</label>
                                                    </div>
                                                    <div class="col" id="archivosubir" style="display: none;">
                                                        <label for="archivo" class="form-label">Archivo</label>
                                                        <input type="file" name="archivo" id="archivo" class="form-control" placeholder="Archivo" accept=".doc,.docx,.xml,.pdf,.pptx,.png,.rar,.zip">
                                                        <div class="invalid-feedback">Archivo</div>
                                                    </div>
                                                    <br>
                                                    <input type="hidden" name="opc" value="1">
                                                    <div class="col">
                                                        <br>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <button type="submit" class="btn btn-success">Crear</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!---------------------------------------------------------------->
                        </div>

                        <div>
                            <?php $actividadesDAO->show($_SESSION['id_usuario']); ?>
                        </div>

                        <?php include('./menus/footer.php');   ?>
                </section>
                <?php
                break;
            case 4:
                if (!empty($_POST['n'])) {
                    if (!empty($_POST['opc'])) {
                        switch ($_POST['opc']) {
                            case 1:

                                $nombreArchivo = $_FILES['archivo']['name'];
                                echo $nombreArchivo;
                                if ($_FILES['archivo']['size'] != 0) {
                                    $formatos = array('.jpg', '.png', '.zip', '.doc', '.docx', '.xml', '.pdf', '.pptx', '.rar');/* nextencione de archivos */
                                    $nombreArchivo = $_FILES['archivo']['name'];/* nombre del archivo */
                                    $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];/* nombre del archivo temporal */
                                    $tamaño = $_FILES['archivo']['size'];
                                    if ($tamaño <= 10485760) {
                                        $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));/* buscar la extension del archivo primero busca rn la cadena con substr y para     encontrar la posicion usa strrpos*/
                                        if (in_array($ext, $formatos))/* in array permite validar si algun elemento esta dentro del array tiene los formatos jpg, png y .zip */ {
                                            $nombreNuevo = "Actividad_" . $nombreArchivo;
                                            if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreNuevo"))
                                                if ($_FILES['archivo']['size']) {
                                                    //echo "Archivo subio exitosamente";
                                                    $bandSubida = "archivos/" . $nombreNuevo;
                                                    $notasOBJ->setArchivo_entrega($bandSubida);
                                                    $notasOBJ->setCalificacion(0);
                                                    date_default_timezone_set("America/Bogota");
                                                    $fecha = strftime("%Y-%m-%d %H:%M:%S", time());
                                                    $notasOBJ->setFecha_entrega($fecha);
                                                    $notasOBJ->setFecha_calificacion("");
                                                    $notasOBJ->setObservacion($_POST['observaciones']);
                                                    $id_usupractica = $_POST['idp'];
                                                    $notasOBJ->setId_usupractica($id_usupractica);
                                                    $notasOBJ->setId_asignacion($_POST['ida']);
                                                    $estado = 5;
                                                    $notasOBJ->setId_estado($estado);
                                                    $notasDAO->create($notasOBJ);
                                                } else {
                                                    echo "Archivo no subido";
                                                }
                                        } else {
                                            echo "Extensión no admitida";
                                        }/* fin else*/
                                    } else {
                                        $msj = "El archivo es demasiado pesado, sobrepasa el límite de 10Mb <br> Tamaño de archivo: " . $tamaño;
                                        mensajeError($msj);
                                    }
                                } else {
                                    $bandSubida = "No";
                                    $notasOBJ->setArchivo_entrega($bandSubida);
                                    $notasOBJ->setCalificacion(0);
                                    $fecha = strftime("%Y-%m-%d %H:%M:%S", time());
                                    $notasOBJ->setFecha_entrega($fecha);
                                    $notasOBJ->setFecha_calificacion("");
                                    $notasOBJ->setObservacion($_POST['observaciones']);
                                    $id_usupractica = $_POST['idp'];
                                    $notasOBJ->setId_usupractica($id_usupractica);
                                    $notasOBJ->setId_asignacion($_POST['ida']);
                                    $estado = 5;
                                    $notasOBJ->setId_estado($estado);
                                    $notasDAO->create($notasOBJ);
                                }

                                break;
                        }
                    }
                    include 'menus/m_estudi.php'; ?>
                    <section class="home-section">
                        <?php include_once 'menus/header.php'; ?>
                        <h2 class="text-center">Actividades para práctica <?php echo $_POST['n']; ?></h2><br>
                        <br>
                        <div class="row container-fluid">
                            <div>
                                <?php $actividadesDAO->listarActividadesParaEstudiantes($_POST['n']); ?>
                            </div>
                        </div>
                        <?php include('./menus/footer.php'); ?>
                    </section>
        <?php
                } else {
                    echo '<meta http-equiv="refresh" content="0;url=listarPracticasView.php">';
                }
                break;
            case 5:
                include 'menus/m_titular.php';
                break;
        }

        ?>

    <?php
    } else {
        zonaSegura();
    }


    include_once 'menus/scriptsFinales.php';

    ?>
    <script src="js/scriptBusqueda.js"></script>
    <script>
        function aparece() {
            var x = document.getElementById("archivosubir");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        
        
        
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
            trigger: 'focus'
        })
    </script>

</body>

</html>