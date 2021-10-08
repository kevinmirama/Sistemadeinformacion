<?php

include_once '../class/classDAO/tiempo.php';
?>


<div class="sidebar">
  <!--  PracSys Menú docente titular-->
    <div class="logo-details">
      <i class='bi bi-pencil-square'></i>
      <span class="logo_name">Pracsys</span>
    </div>
      <ul class="nav-links"style="padding-left: 0rem;">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bi bi-house-door-fill' ></i>
            <span class="links_name">Inicio</span>
          </a>
        </li>
         <li>
          <a href="listarUsuariosView.php">
           <i class='bi bi-people-fill' ></i>
            <span class="links_name">Usuarios</span>
          </a>
        </li>
        <li>
          <a href="#">
             <i class='bi bi-journal-text' ></i>
            <span class="links_name">Planes clase</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-file-earmark-check"></i>
            <span class="links_name">Evaluaciones</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-card-list"></i>
            <span class="links_name">Reportes</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bi bi-person-square' ></i>
            <span class="links_name">Mi perfil<!-- Aqui va el nombre --> </span>
          </a>
        </li>
        <li>
          <a href="#">
              <i class='bi bi-question-diamond' ></i>
            <span class="links_name">Ayuda</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../class/salir.php">
          <i class='bi bi-box-arrow-left'></i>
            <span class="links_name">Cerrar Sesión</span>
          </a>
        </li>
      </ul>
  </div>