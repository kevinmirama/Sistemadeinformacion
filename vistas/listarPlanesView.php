<?php
session_start();
include '../class/classDAO/funciones.php';
include '../class/classDAO/planesclasesDAO.php';


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
    <script src="js/sweetalert2.all.min.js"></script>

    <title>PracSys - Planes de clase</title>
</head>

<body>
    <?php
    if (!empty($_SESSION['id_usuario'])) {
        if (!empty($_POST['idusuprac'])) {
            $idusupractica = $_POST['idusuprac'];
        } else {
            header('Location:../vistas/dashboard.php');
        }
        $nom_usu = $_SESSION['nombre_usuario'];
        $id_rol = $_SESSION['id_rol'];
        $rol = $_SESSION['rol'];
        $id_usu = $_SESSION['id_usuario'];
        $programa =  $_SESSION['id_prog'];
        $logo = $_SESSION['logo'];
        $programa = $_SESSION['programa'];

        $planesOBJ = new planesclasesClass();
        $planesDAO = new planesclasesDAO();
        switch ($id_rol) {
                //Cuadrar la dashboard dependiendo del rol que se tenga

            case 1: ?>
                <?php include 'menus/m_admin.php'; ?>
                <section class="home-section">
                    <nav>
                        <div class="sidebar-button">
                            <i class='bx bx-menu sidebarBtn'></i>
                            <span class="dashboard"><?php echo $rol . " " . $_SESSION['nombre_usuario']; ?></span>
                        </div>
                        <div class="profile-details">
                            <img src="<?php echo $logo; ?>" alt="">
                            <span class="admin_name"><?php echo $programa; ?></span>
                        </div>
                    </nav>
                    <br><br><br><br>
                    <div class="row container-fluid">
                        //AQUI VA LO QUE SE QUIERA COLOCAR PARA EL ADMIN

                    </div>
                    <?php include 'menus/footer.php'; ?>
                </section>
            <?php break;

            case 2: ?>
                <?php include 'menus/m_cordi.php'; ?>
                <section class="home-section">
                    <nav>
                        <div class="sidebar-button">
                            <i class='bx bx-menu sidebarBtn'></i>
                            <span class="dashboard"><?php echo $rol . " " . $_SESSION['nombre_usuario']; ?></span>
                        </div>
                        <div class="profile-details">
                            <img src="<?php echo $logo; ?>" alt="">
                            <span class="admin_name"><?php echo $programa; ?></span>
                        </div>
                    </nav>
                    <br><br><br><br>
                    <div class="row container-fluid">
                        //AQUI VA LO QUE SE QUIERA COLOCAR PARA EL COORDINADOR

                    </div>
                    <?php include 'menus/footer.php'; ?>
                </section>
            <?php break;

            case 3: ?>
                <?php include 'menus/m_asesor.php'; ?>
                <section class="home-section">
                    <nav>
                        <div class="sidebar-button">
                            <i class='bx bx-menu sidebarBtn'></i>
                            <span class="dashboard"><?php echo $rol . " " . $_SESSION['nombre_usuario']; ?></span>
                        </div>
                        <div class="profile-details">
                            <img src="<?php echo $logo; ?>" alt="">
                            <span class="admin_name"><?php echo $programa; ?></span>
                        </div>
                    </nav>
                    <br><br><br><br>
                    <div class="row container-fluid">
                        //AQUI VA LO QUE SE QUIERA COLOCAR PARA EL ASESOR

                    </div>
                    <?php include 'menus/footer.php'; ?>
                </section>
            <?php break;

            case 4: 
                if (!empty($_POST['opc'])) {
                    switch ($_POST['opc']) {
                        case 1:
                            //Nuevo plan
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
                                        $nombreNuevo = "PlanClase_" . $nombreArchivo;
                                        if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreNuevo"))
                                            if ($_FILES['archivo']['size']) {
                                                //echo "Archivo subio exitosamente";
                                                $bandSubida = "archivos/" . $nombreNuevo;
                                                $planesOBJ->setArchivo($bandSubida);
                                                $planesOBJ->setId_usupractica($idusupractica);
                                                $planesOBJ->setDescripcion($_POST['descripcion']);
                                                $planesOBJ->setGrado($_POST['grado']);
                                                $planesDAO->create($planesOBJ);
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
                                $planesOBJ->setArchivo($bandSubida);
                                $planesOBJ->setId_usupractica($idusupractica);
                                $planesOBJ->setDescripcion($_POST['descripcion']);
                                $planesOBJ->setGrado($_POST['grado']);
                                $planesDAO->create($planesOBJ);
                            }

                            
                            break;
                    }
                }
            
            
            ?>
                
                <?php include 'menus/m_estudi.php'; ?>
                <section class="home-section">
                    <nav>
                        <div class="sidebar-button">
                            <i class='bx bx-menu sidebarBtn'></i>
                            <span class="dashboard"><?php echo $rol . " " . $_SESSION['nombre_usuario']; ?></span>
                        </div>
                        <div class="profile-details">
                            <img src="<?php echo $logo; ?>" alt="">
                            <span class="admin_name"><?php echo $programa; ?></span>
                        </div>
                    </nav>
                    <br><br><br><br>
                    <div class="row container-fluid">
                        <h2 class="text-center">Lista de planes de clase</h2>
                        <br><br>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#nuevoplan" style="background-color:#16697a">
                                    <i class="bi bi-plus-square"></i> Añadir plan de clase</button>
                                <div class="modal fade" id="nuevoplan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Nuevo plan de clase</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data" class="" action="" method="POST" name="formulario_planes">
                                                    <div class="row-mb-3">
                                                        <div class="col">
                                                            <br>
                                                            <div class="col">
                                                                <label for="descripcion" class="form-label">Descripción</label>
                                                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción plan de clase" required>
                                                                <div class="invalid-feedback"></div>
                                                            </div><br>
                                                            <div class="col">
                                                                <label for="grado" class="form-label">Grado</label>
                                                                <select class="form-control" name="grado" id="grado">
                                                                    <option value="1">Grado 1</option>
                                                                    <option value="2">Grado 2</option>
                                                                    <option value="3">Grado 3</option>
                                                                    <option value="4">Grado 4</option>
                                                                    <option value="5">Grado 5</option>
                                                                    <option value="6">Grado 6</option>
                                                                    <option value="7">Grado 7</option>
                                                                    <option value="8">Grado 8</option>
                                                                    <option value="9">Grado 9</option>
                                                                    <option value="10">Grado 10</option>
                                                                    <option value="11">Grado 11</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </div><br>
                                                            <div class="col" id="archivosubir">
                                                                <label for="archivo" class="form-label">Archivo</label>
                                                                <input type="file" name="archivo" id="archivo" class="form-control" placeholder="Archivo" accept=".doc,.docx,.xml,.pdf,.pptx,.png,.rar,.zip" required>
                                                                <div class="invalid-feedback">Adjuntar archivo</div>
                                                            </div>
                                                            <br>
                                                            <input type="hidden" name="opc" value="1">
                                                            <input type="hidden" name="idusuprac" value="<?php echo $idusupractica; ?>">
                                                            <input type="hidden" name="insti" value="<?php echo $_POST['insti']; ?>">

                                                            <div class="col text-center">
                                                                <button type="submit" class="btn btn-success">Entregar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <?php
                        //echo 'Idusupractica= '.$idusupractica;
                        $planesDAO->show($idusupractica);
                        ?>

                    </div>
                    <?php include 'menus/footer.php'; ?>
                </section>
    <?php break;

            default:
            echo 'Área restringida';
            header("Location: dashboard.php");
                break;
        }
    } else {
        zonaSegura();
    }
    
    ?>
<script src="js/scriptBusqueda.js"></script>
   
   
   <?php include 'menus/scriptsFinales.php';

    ?>
</body>

</html>