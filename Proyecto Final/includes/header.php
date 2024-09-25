<?php

$role = isset($_SESSION["role"]) ? $_SESSION["role"] : 'user';  // Establecer el rol por defecto

// El resto de tu código del header
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary header">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo $Direc;?>">
      <img id="filtrado" src="../assets/images/Looo.svg" width="40" height="40">
      RecipeEase
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><img src="../assets/images/list.svg" class="LogoCelu"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav text-end ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nombreU" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color : color: #222222;";>
            <?php echo $nombre; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="EditarPerfil.php">Editar Perfil</a></li>
            <li><a class="dropdown-item" href="historial.php">Historial</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../base_de_datos/CerrarSession.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
      <div class="p-3">
      <?php 
          echo "<img class='rounded-circle me-2' width='50' height='50' id='filtrado'src='$imagen'>";
      ?>
      </div>
      
    </div>
</nav>
