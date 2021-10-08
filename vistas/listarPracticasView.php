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
  include '../class/classDAO/practicaDAO.php';

  $practicaDAO = new practicaDAO();

  if (!empty($_SESSION['id_usuario'])) {
    switch ($_SESSION['id_rol']) {
      case 1:
        include 'menus/m_admin.php';
  ?>
        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <h1 class="text-center">Practicas pedagógicas</h1>
          <div class="row container-fluid">
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!-- Button  -->
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Todas</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Activas</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Inactivas</button>
              </div>
            </nav>
            
            <div class="tab-content" id="nav-tabContent">
            <br>  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticas(0);
              ?><br><br>
            </div>
          </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticas(1);
              ?><br><br>
            </div>  

              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticas(2);
              ?><br><br>
            </div>  
              </div>
            </div>



            
          </div>
          <?php include('./menus/footer.php');   ?>
        </section>
      <?php

        break;
      case 2:
        include 'menus/m_cordi.php';
        ?>
        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <h1 class="text-center">Practicas pedagógicas</h1>
          <div class="row container-fluid">
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!-- Button  -->
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Todas</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Activas</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Inactivas</button>
              </div>
            </nav>
            
            <div class="tab-content" id="nav-tabContent">
            <br>  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticasPorPrograma(0, $_SESSION['id_prog']);
              ?><br><br>
            </div>
          </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticasPorPrograma(1, $_SESSION['id_prog']);
              ?><br><br>
            </div>  

              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div>
              <br><br><br><?php
              $practicaDAO->listarTodasPracticasPorPrograma(2, $_SESSION['id_prog']);
              ?><br><br>
            </div>  
              </div>
            </div>



            
          </div>
          <?php include('./menus/footer.php');   ?>
        </section>
      <?php

        break;
      case 3:
        include 'menus/m_asesor.php';
        if (!empty($_POST['opc'])) {
          //echo 'pase';
          switch ($_POST['opc']) {
            case 1:
              $nombre_practica = $_POST['nombre_practica'];
              $fecha_inicio = $_POST['fecha_inicio'];
              $fecha_fin = $_POST['fecha_fin'];
              $id_estado = $_POST['id_estado'];
              $id_usu = $_SESSION['id_usuario'];
              $practicaOBJ = new practicaClass();
              $practicaOBJ->setId_practica(null);
              $practicaOBJ->setNombre_practica($nombre_practica);
              $practicaOBJ->setFecha_inicio($fecha_inicio);
              $practicaOBJ->setFecha_fin($fecha_fin);
              $practicaOBJ->setId_estado($id_estado);
              $practicaOBJ->setId_usu($id_usu);
              $practicaDAO->create($practicaOBJ);
              break;
          }
        }
      ?>

        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <h1 class="text-center">Practicas pedagógicas</h1>
          <div class="row container-fluid">
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!-- Button  -->
            <div class="col-sm-3">
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#anadirnuevapractica" style="background-color:#16697a">
                <i class="bi bi-plus-square"></i> Nueva práctica pedagógica
              </button>
            </div><br><br>
            <!-- Modal -->
            <div class="modal fade" id="anadirnuevapractica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-square"></i> Añadir nueva práctica pedagógica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" name="formulario_registro">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="nombre_practica" class="form-label small">Nombre práctica pedagógica</label>
                          <input type="text" name="nombre_practica" id="nombre_practica" class="form-control" placeholder="Nombre práctica pedagógica" required>
                        </div>
                        <div class="col-sm-6">
                          <label for="fecha_ini" class="form-label small">Fecha inicio</label>
                          <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                          <label for="fecha_fin" class="form-label small">Fecha finalización</label>
                          <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                          <label for="id_estado" class="form-label small">Estado</label>
                          <select id="id_estado" class="form-select" name="id_estado" required>
                            <option selected>Seleccione uno...</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                            <option value="3">En proceso</option>
                          </select>
                        </div>
                        <input type="hidden" name="opc" value="1">
                        <div class="col-md-12">
                          <br>
                          <label for='id_prog' class='form-label small'>Programa <?php echo $_SESSION['programa']; ?></label>
                          <br>
                        </div>
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
            <div>
              <?php
              $practicaDAO->listarPracticas($_SESSION['id_usuario']);
              ?>
            </div>
          </div>
          <?php include('./menus/footer.php');   ?>
        </section>

      <?php
        break;
      case 4:
        include 'menus/m_estudi.php';
      ?>

        <section class="home-section">
          <?php include_once 'menus/header.php'; ?>
          <h1 class="text-center">Practicas pedagógicas</h1><br><br>
          <div class="row container-fluid">
            <?php

            $practicaDAO->listarPracticasEstudiante($_SESSION['id_usuario']);
            ?>
          </div>
          <?php include('./menus/footer.php');   ?>
        </section>

    <?php
        break;
    }
    ?>

  <?php
  } else {
    zonaSegura();
  }

  ?>
  <script src="js/scriptBusqueda.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/javascript">
     var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        
        
        
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
            trigger: 'focus'
        })
  </script>
  <?php include_once 'menus/scriptsfinales.php'; ?>

</body>

</html>