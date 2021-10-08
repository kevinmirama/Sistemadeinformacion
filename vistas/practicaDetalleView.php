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
    <title>PracSys - Lista de Prácticas</title>
</head>

<body>
    <?php
    session_start();
    include_once '../class/classDAO/tiempo.php';
    include '../class/classDAO/usuariosDAO.php';
    $usuariosDAO = new usuariosDAO();

    if (!empty($_SESSION['id_usuario'])) {

        switch ($_SESSION['id_rol']) {
            case 1:
                include 'menus/m_admin.php';
                break;
            case 2:
                include 'menus/m_cordi.php';
                break;
            case 3:
                include 'menus/m_asesor.php';
                if (!empty($_POST['opc'])) {
                    echo 'pase';
                    switch ($_POST['opc']) {
                        case 1:

                            break;
                    }
                }
    ?>
                <section class="home-section">
                    <?php include_once 'menus/header.php'; ?>
                    <h1 class="text-center">Estudiantes práctica</h1>
                    <div class="row container-fluid">
                        <!---------------------------------------------------------------->

                        <div>
                            <?php
                            $usuariosDAO->listarEstudiantes($_GET['n']);
                            ?>
                        </div>

                        <?php include('./menus/footer.php');   ?>
                </section>

    <?php
                break;
            case 4:
                include 'menus/m_estudi.php';
                break;
            case 5:
                include 'menus/m_titular.php';
                break;
        }
    } else {
        zonaSegura();
    }


    include 'menus/scriptsFinales.php';

    ?>
    <script src="js/scriptBusqueda.js"></script>

</body>

</html>