<?php 
    session_start();
    $ID = -1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estilo.css">
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/js/Imagen.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
<?php 
            if(isset($_SESSION["Registrado"])){   
                include "../includes/header-ingresado.php";
            }else{
                include "../includes/header-registro-login.php";
            }
        ?>
        <div class="row espacioTop">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="container bodReg p-5">
                    <div class="container registro">
                        <form action="Subír.php" method="POST">
                            <input type="hidden" name="ID" value="<?$ID?>">
                            <h3 class="ingreso">Ingresar Nombre</h3>  <input type="text" name="name" class="butR" placeholder="Nombre" required><br>
                            <br><br>
                            <h3 class="ingreso">Ingresar Email</h3> <input type="text" name="email" class="butR" placeholder="Correo Electronico" required><br>
                            <br><br>
                            <h3 class="ingreso">Ingresar Contraseña</h3>  <input type="password" name="Contra" class="butR" placeholder="Contraseña" required><br>
                            <br><br>
                            <h3 class="ingreso">Confirmar Contraseña</h3>   <input type="password" name="ContraV" class="butR" placeholder="Verificación Contraseña" required><br>
                            <br><br>
                            <h3 class="ingreso">Ingresar Imagen</h3> <input type="file" accept="image/*" onchange="previewImage(event, '#imgPreview')" name="img" class="ImgInput"> <input type="text" name="ContraV" class="butR" id="textimg" value="" placeholder="Imagen Seleccionada" ><br> <img id="imgPreview" class="ImgInput-Imagen" src="nada.png"><br>
                            <br><br>
                            <div class="col-md-12"><a href="acceder.php">Ya tienes una cuenta? Inicia sessión</a></div>
                            <div class="row BotonRegistro pt-4">
                            <div class="col-md-12"><input type="submit" class="BottunsRegistrar" name="Registrar" value="Registrar"></div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
</body>
</html>