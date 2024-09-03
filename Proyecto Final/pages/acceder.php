<?php 
session_start();

if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <script defer src="../assets/js/Cod.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
    <?php 
        if(isset($_SESSION["Registrado"])){   
            include "../includes/header-ingresado.php";
        } else {
            include "../includes/header-registro-login.php";
        }
    ?>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="bodReg p-4">
                    <form action="../base_de_datos/Chequeo.php" method="POST">
                        <input type="hidden" name="id">
                        
                        <h3 class="ingreso mb-4">Ingresar Email</h3>  
                        <input type="text" name="email" class="butR  mb-3" placeholder="Email" required>
                        
                        <h3 class="ingreso mb-4">Ingresar Contraseña</h3>  
                        <input type="password" name="Contra" class="butR  mb-4" placeholder="Contraseña" required>
                        
                        <div>
                            <input type="submit" class="BottunsRegistrar" value="Acceder">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
