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
    
    if (!empty($_SESSION['id_rol'])) {
        switch ($_SESSION['id_rol']) {
            case 4:
                include 'menus/m_estudi.php';
                break;
            default:
                header('Location:../vistas/dashboard.php');
                break;
        }


    ?>
        <section class="home-section">
            <?php include_once 'menus/header.php'; ?>
            <div class="row container-fluid">
                <h2 class="text-center">Instituciones/Organizaciones</h2>
                <div>
                    <?php
                    
                    $institucionesDAO->showParaEstudiantes();

                    ?>

                </div>
            </div>

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