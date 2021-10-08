<?php include 'menus/m_coordi.php'; ?>
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
            <div class="col-sm-3">
              <div class="card text-light mb-3 shadow rounded" style="max-width: 18rem; background-color:#006400">
                <div class="card-header text-center">Asesores</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarUsuariosView.php" class="btn stretched-link"><i class="bi bi-people-fill" style="font-size: 64px; color:white""></i></a></h5>
                        <p class=" card-text text-center">Asesores de <?php echo $programa; ?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-dark mb-3 shadow rounded" style="max-width: 18rem; background-color:#ffc045">
                <div class="card-header text-center">Instituciones </div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarinstitucionesView.php" class="btn stretched-link"><i class="bi bi-people-fill" style="font-size: 64px"></i></a></h5>
                  <p class="card-text text-center">Registre o revise las Instituciones Educativas en el sistema </p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#065471;">
                <div class="card-header text-center">Prácticas</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarPracticasView.php" class="btn stretched-link"><i class="bi bi-inboxes-fill" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Información sobre las prácticas docentes</p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#0a91ab">
                <div class="card-header text-center">Programas</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-journal-text" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Registre o revise los programas en el sistema</p>
                </div>
              </div>
            </div>


          </div>
          <?php include 'menus/footer.php'; ?>