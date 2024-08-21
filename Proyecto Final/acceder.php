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
    <link rel="stylesheet" href="css/Estilo.css">
    <script defer src="js/Cod.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
        <?php 
            if(isset($_SESSION["Registrado"])){   
                include "includes/header-ingresado.php";
            }else{
                include "includes/header-registro-login.php";
            }
        ?>
        <div class="row espacioTop">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="container bodReg p-5">
                    <div class="container registroAcceso">
                        <form action="Chequeo.php" method="POST">
                            <input type="hidden" name="id">
                            <h3 class="ingreso">Ingresar Email</h3>  <input type="text" name="email" class="butR" placeholder="Email" required><br>
                            <br><br>
                            <h3 class="ingreso">Ingresar Contraseña</h3>  <input type="password" name="Contra" class="butR" placeholder="Contraseña" required><br>
                            <br><br>
                            <div class="col-md-12"><a href="Registrarse.php">Aun no tienes una cuenta? Registrate</a></div>
                            <div class="row BotonRegistro pt-4">
                            <div class="col-md-12"><input type="submit" class="BottunsRegistrar" value="Acceder"></div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
</body>
</html>