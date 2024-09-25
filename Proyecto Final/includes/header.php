<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_SESSION["IdUsuario"];

// Consultar los datos del usuario
$sql = "SELECT * FROM usuarios WHERE ID = $id";
if ($re = mysqli_query($conn, $sql)) {
    $r = mysqli_fetch_array($re);
    $Nombre = $r['Nombre'];
    $imagen = $r['Imagen'];
}

// Si la imagen está vacía, asignar la imagen por defecto
if (empty($imagen)) {
    $imagen = "../images/default.png";  // Ruta de la imagen por defecto
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary header">
  <div class="container-fluid">
    <a class="navbar-brand" href="">
      <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="40" height="40">
      RecipeEase
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav text-end ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $Nombre; ?>
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
          echo "<img class='rounded-circle me-2' width='50' height='50' src='$imagen' alt='Imagen de perfil'>";
      ?>
      </div>
      
    </div>
  </div>
</nav>
