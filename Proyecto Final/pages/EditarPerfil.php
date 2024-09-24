<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);
<<<<<<< HEAD
$id = $_SESSION["IdUsuario"];

$sql = "SELECT * FROM usuarios WHERE ID = $id";
if ($re = mysqli_query($conn, $sql)) {
    $r = mysqli_fetch_array($re);
    $Nombre = $r['Nombre'];
    $Email = $r['Email'];
    $Contraseña = $r['Contra'];
    $ImagenActual = $r['Imagen'];
}
=======
$id= -1;
$id = $_SESSION["IdUsuario"];
		
		$sql = "SELECT * FROM usuarios WHERE ID = $id";
			if ($re = mysqli_query($conn, $sql)) {
				$r= mysqli_fetch_array($re);
				$Nombre = $r['Nombre'];
				$Email = $r['Email'];
				$Contraseña = $r['Contra'];
	}
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Editar Perfil - RecipeEase</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/editarperfil.css">

</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="profile-container">
            <h1 class="text-center">Editar Perfil</h1>
            <div class="text-center mb-4">
                <img id="profilePreview" class="profile-img-preview" src="<?= !empty($ImagenActual) ? $ImagenActual : 'https://via.placeholder.com/120' ?>" alt="Imagen de Perfil">
            </div>
            <form action="../base_de_datos/EditarUser.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" value="<?=$Email?>" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="<?=$Nombre?>" name="name" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" value="<?=$Contraseña?>" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de Perfil</label>
                    <input type="file" class="form-control file-input" name="imagen" accept="image/*" id="imageUpload">
                </div>
                <button type="submit" name="Registrar" class="btn btn-edit w-100">Editar</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript para previsualizar la imagen cargada
        const imageUpload = document.getElementById('imageUpload');
        const profilePreview = document.getElementById('profilePreview');

        imageUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
=======
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <title>RecipeEase</title>
</head>
<body class="body">
    <?php 
        include "../includes/header-ingresado.php";
    ?>
        <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
            <div class="container bg-dark text-light p-4 rounded shadow" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="80" height="80">
                    <h1 class="h3 mb-4">Editar Perfil</h1>
                </div>
                <form action="../base_de_datos/EditarUser.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control bg-secondary text-light border-secondary" value="<?=$Email?>" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control bg-secondary text-light border-secondary" value="<?=$Nombre?>" name="name" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-4">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control bg-secondary text-light border-secondary" value="<?=$Contraseña?>" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="form-label">Imagen de Perfil</label>
                    <input type="file" class="form-control bg-secondary text-light border-secondary" name="imagen" accept="image/*">
                </div>
                <button type="submit" name="Registrar" class="btn btn-light w-100 mb-3">Editar</button>
            </form>
            </div>
        </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
