<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_SESSION["IdUsuario"];

$sql = "SELECT * FROM usuarios WHERE ID = $id";
if ($re = mysqli_query($conn, $sql)) {
    $r = mysqli_fetch_array($re);
    $Nombre = $r['Nombre'];
    $imagen = $r['Imagen'];
}
?>
<link rel="stylesheet" href="../assets/css/Estilo.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary header-bot">
  <div class="container-fluid" >
    <a class="navbar-brand" href="ChatBot.php">
      <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" class="img-fluid" width="40" height="40">RecipeEase
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><img src="../assets/images/list.svg"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" style="backgrbackground-color: rgba(26, 26, 26, 0.603);" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <?php 
          if (!empty($imagen)) {
            echo "<img class='rounded-circle me-2' width='50' height='50' src='$imagen' alt='Imagen de perfil'>";
          }
          ?>
          <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $Nombre; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="EditarPerfil.php">Editar Perfil</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../base_de_datos/CerrarSession.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../base_de_datos/CerrarSession.php">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>
