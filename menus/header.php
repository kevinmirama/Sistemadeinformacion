<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $_SESSION['rol'] . " " . $_SESSION['nombre_usuario']; ?></span>
    </div>
    <div class="profile-details">
        <img src="<?php echo $_SESSION['logo']; ?>" alt="">
        <span class="admin_name"><?php echo $_SESSION['programa']; ?></span>
    </div>
</nav>
<br><br><br><br>