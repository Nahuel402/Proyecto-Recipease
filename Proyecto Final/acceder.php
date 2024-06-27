<?php 
    session_start();

    $_SESSION["Volver"]= 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Estilos.css">
    <script defer src="js/Cod.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
<div class="container header">
            <div class="row header">
                <div class="col-md-2">
                    <h5><img class="Logo" src="Logo.png" alt="">RecipeEase</h5>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <a href="">Novedades</a>
                </div>
            </div>
        </div>
    <div class="container bod">
        <div class="container registro">
            <form action="Chequeo.php" method="POST">
                <h3>Ingresar Nombre  <input type="text" name="Nombre" class="butR" placeholder="Nombre" required><br></h3>
                <br><br><br>
                <h3>Ingresar Contraseña  <input type="password" name="Pass" class="butR" placeholder="Contraseña" required><br></h3>
                <br><br><br>
                <div class="row BotonRegistro">
                <div class="col-md-6"><input type="submit" class="Registrar" value="Acceder"></div><div class="col md 6"><button class="Registrar" onclick="Volver()">Volver</button></div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="row Foot pt-2">
            <div class="col-md-2"><a href="">asd</a></div>
            <div class="col-md-2"><a href="">asd</a></div>
            <div class="col-md-2"><a href="">asd</a></div>
            <div class="col-md-2"><a href="">asd</a></div>
            <div class="col-md-2"><a href="">asd</a></div>
            <div class="col-md-2"><a href="">asd</a></div>
        </div>
    </div>
</body>
</html>