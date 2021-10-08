<?php
session_start();
include_once '../class/classDAO/tiempo.php';
include '../class/classDAO/usuariosDAO.php';

?>
<!DOCTYPE html>

<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilodashboard.css">

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Iconos de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php

  if (!empty($_SESSION['id_usuario'])) {
    $nom_usu = $_SESSION['nombre_usuario'];
    $id_rol = $_SESSION['id_rol'];
    $rol = $_SESSION['rol'];
    $id_usu = $_SESSION['id_usuario'];
    $id_prog = $_SESSION['logo'];
    switch ($id_rol) {
        //Cuadrar la dashboard dependiendo del rol que se tenga

      case 1: ?>
        <?php include 'menus/m_admin.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <div class="col-sm-3">
              <div class="card text-dark mb-3 shadow rounded" style="max-width: 18rem; background-color:#ffc045">
                <div class="card-header text-center">Usuarios</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarUsuariosView.php" class="btn stretched-link"><i class="bi bi-people-fill" style="font-size: 64px"></i></a></h5>
                  <p class="card-text text-center">Todos los usuarios</p>
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
              <div class="card text-light mb-3 shadow rounded" style="max-width: 18rem; background-color:#e28000">
                <div class="card-header text-center">Instituciones</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarinstitucionesView.php" class="btn stretched-link"><i class="bi bi-file-earmark-richtext" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Lista general de Instituciones Educativas</p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#0a91ab">
                <div class="card-header text-center">Programas</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-journal-text" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Listar programas </p>
                </div>
              </div>
            </div>

          </div>
          <?php include 'menus/footer.php'; ?>
        </section>   
      <?php break;

      case 2: ?>
      <?php include 'menus/m_cordi.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>
          <div class="row container-fluid">
            <div class="col-sm-3">
              <div class="card text-light mb-3 shadow rounded" style="max-width: 18rem; background-color:#006400">
                <div class="card-header text-center">Usuarios</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarUsuariosView.php" class="btn stretched-link"><i class="bi bi-people-fill" style="font-size: 64px; color:white""></i></a></h5>
                        <p class=" card-text text-center">Usuarios de <?php echo $_SESSION['programa']; ?></p>
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
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
 
      <?php break;

      case 3: ?>
        <?php include 'menus/m_asesor.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>

          <div class="row container-fluid">
            <div class="col-sm-3">
              <div class="card text-light mb-3 shadow rounded" style="max-width: 18rem; background-color:#006400">
                <div class="card-header text-center">Usuarios</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="listarUsuariosView.php" class="btn stretched-link"><i class="bi bi-people-fill" style="font-size: 64px; color:white""></i></a></h5>
                        <p class=" card-text text-center">Usuarios de <?php echo $_SESSION['programa']; ?></p>
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
              <div class="card text-light mb-3 shadow rounded" style="max-width: 18rem; background-color:#e28000">
                <div class="card-header text-center">Actividades</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-file-earmark-richtext" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Lista general de actividades pendientes y realizadas</p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#0a91ab">
                <div class="card-header text-center">Instituciones</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-layers-half" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Registre o revise las instituciones en el sistemas</p>
                </div>
              </div>
            </div>

          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php break;

      case 4: ?>
        <?php include 'menus/m_estudi.php'; ?>
        <section class="home-section">
        <?php include_once 'menus/header.php'; ?>

          <div class="row container">
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#065471;">
                <div class="card-header text-center">Prácticas</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-inboxes-fill" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Información sobre las prácticas docentes</p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-white mb-3 shadow rounded" style="max-width: 18rem; background-color:#0a91ab">
                <div class="card-header text-center">Planes de clase</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-journal-text" style="font-size: 64px; color:white"></i></a></h5>
                  <p class="card-text text-center">Carga y descarga tus planes de clase</p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card text-dark mb-3 shadow rounded" style="max-width: 18rem; background-color:#ffc045">
                <div class="card-header text-center">Notas</div>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="" class="btn stretched-link"><i class="bi bi-card-checklist" style="font-size: 64px"></i></a></h5>
                  <p class="card-text text-center">Revisa tus notas hasta el momento</p>
                </div>
              </div>
            </div>
          </div>
          <?php include 'menus/footer.php'; ?>
        </section>
      <?php break;

      case 5: ?>
        <?php include 'menus/m_titular.php'; ?>
        <section class="home-section">
          <nav>
            <div class="sidebar-button">
              <i class='bx bx-menu sidebarBtn'></i>
              <span class="dashboard">Dashboard <?php echo $rol; ?></span>
            </div>
            <div class="search-box">
              <input type="text" placeholder="Buscar...">
              <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
              <img src="<?php echo $logo; ?>" alt="">
              <span class="admin_name"><?php echo $programa; ?></span>
            </div>
          </nav>

          <div class="home-content">
            <div class="overview-boxes">
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Actividades</div>
                  <div class="number">2</div>
                  <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Lista general de actividades</span>
                  </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
              </div>
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Total Sales</div>
                  <div class="number">38,876</div>
                  <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                  </div>
                </div>
                <i class='bx bxs-cart-add cart two'></i>
              </div>
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Total Profit</div>
                  <div class="number">$12,876</div>
                  <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                  </div>
                </div>
                <i class='bx bx-cart cart three'></i>
              </div>
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Total Return</div>
                  <div class="number">11,086</div>
                  <div class="indicator">
                    <i class='bx bx-down-arrow-alt down'></i>
                    <span class="text">Down From Today</span>
                  </div>
                </div>
                <i class='bx bxs-cart-download cart four'></i>
              </div>
            </div>

            <div class="sales-boxes">
              <div class="recent-sales box">
                <div class="title">Recent Sales</div>
                <div class="sales-details">
                  <ul class="details">
                    <li class="topic">Date</li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                  </ul>
                  <ul class="details">
                    <li class="topic">Customer</li>
                    <li><a href="#">Alex Doe</a></li>
                    <li><a href="#">David Mart</a></li>
                    <li><a href="#">Roe Parter</a></li>
                    <li><a href="#">Diana Penty</a></li>
                    <li><a href="#">Martin Paw</a></li>
                    <li><a href="#">Doe Alex</a></li>
                    <li><a href="#">Aiana Lexa</a></li>
                    <li><a href="#">Rexel Mags</a></li>
                    <li><a href="#">Tiana Loths</a></li>
                  </ul>
                  <ul class="details">
                    <li class="topic">Sales</li>
                    <li><a href="#">Delivered</a></li>
                    <li><a href="#">Pending</a></li>
                    <li><a href="#">Returned</a></li>
                    <li><a href="#">Delivered</a></li>
                    <li><a href="#">Pending</a></li>
                    <li><a href="#">Returned</a></li>
                    <li><a href="#">Delivered</a></li>
                    <li><a href="#">Pending</a></li>
                    <li><a href="#">Delivered</a></li>
                  </ul>
                  <ul class="details">
                    <li class="topic">Total</li>
                    <li><a href="#">$204.98</a></li>
                    <li><a href="#">$24.55</a></li>
                    <li><a href="#">$25.88</a></li>
                    <li><a href="#">$170.66</a></li>
                    <li><a href="#">$56.56</a></li>
                    <li><a href="#">$44.95</a></li>
                    <li><a href="#">$67.33</a></li>
                    <li><a href="#">$23.53</a></li>
                    <li><a href="#">$46.52</a></li>
                  </ul>
                </div>
                <div class="button">
                  <a href="#">See All</a>
                </div>
              </div>
              <div class="top-sales box">
                <div class="title">Top Seling Product</div>
                <ul class="top-sales-details">
                  <li>
                    <a href="#">
                      <!--<img src="images/sunglasses.jpg" alt="">-->
                      <span class="product">Vuitton Sunglasses</span>
                    </a>
                    <span class="price">$1107</span>
                  </li>
                  <li>
                    <a href="#">
                      <!--<img src="images/jeans.jpg" alt="">-->
                      <span class="product">Hourglass Jeans </span>
                    </a>
                    <span class="price">$1567</span>
                  </li>
                  <li>
                    <a href="#">
                      <!-- <img src="images/nike.jpg" alt="">-->
                      <span class="product">Nike Sport Shoe</span>
                    </a>
                    <span class="price">$1234</span>
                  </li>
                  <li>
                    <a href="#">
                      <!--<img src="images/scarves.jpg" alt="">-->
                      <span class="product">Hermes Silk Scarves.</span>
                    </a>
                    <span class="price">$2312</span>
                  </li>
                  <li>
                    <a href="#">
                      <!--<img src="images/blueBag.jpg" alt="">-->
                      <span class="product">Succi Ladies Bag</span>
                    </a>
                    <span class="price">$1456</span>
                  </li>
                  <li>
                    <a href="#">
                      <!--<img src="images/bag.jpg" alt="">-->
                      <span class="product">Gucci Womens's Bags</span>
                    </a>
                    <span class="price">$2345</span>
                  <li>
                    <a href="#">
                      <!--<img src="images/addidas.jpg" alt="">-->
                      <span class="product">Addidas Running Shoe</span>
                    </a>
                    <span class="price">$2345</span>
                  </li>
                  <li>
                    <a href="#">
                      <!--<img src="images/shirt.jpg" alt="">-->
                      <span class="product">Bilack Wear's Shirt</span>
                    </a>
                    <span class="price">$1245</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
  <?php break;
      default:
        break;
    }
  } else {
    zonaSegura();
  } ?>

<?php include_once 'menus/scriptsFinales.php'; ?>
 
</body>

</html>