<?php 
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recipeease";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_SESSION["IdUsuario"])){
        $Nombre= "";
        $Imagen= "";
        $query = mysqli_query ($conn, " SELECT Nombre, Imagen FROM usuarios ") or die (mysqli_error($conn));
        while ($row = mysqli_fetch_array($query)){
            $Nombre = $row["Nombre"];
            $Imagen = $row["Imagen"];
        }
    }
    if(isset($_SESSION["Registrado"])){
        if($_SESSION["Registrado"] != 0 ){
            $_SESSION["Volver"]=0;
        }
    }else{
        $_SESSION["Volver"] = 1;
    }
    if($_SESSION["Volver"] != 0){
        echo'<div class="window-notice" id="window-notice">
            <div class="content">
                <div class="content-text BotonRegistro">No te has registrado </div>
                <div class="content-buttons"><button Onclick="Alert()" id="close-button" class="buttonAlert">Aceptar</button></div>
            </div>
        </div>';
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estilo.css">
    <script defer src="../assets/js/Cod.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
<script>
    Console.log('.<?$_SESSION["IdUsuario"]?>.');
</script><?php 
            if(isset($_SESSION["Registrado"])){   
                include "../includes/header-ingresado.php";
            }else{
                include "../includes/header.php";
            }
        ?>
        <div class="row espacioTop">
            <div class="col-md-1"></div>
            <div class="col-md-7 Cont-bod">
                <div class="col-md-12 bod">
                <div class="container p-4">
                    <div class="col-md-12 pt-4">
                        <div class="col-md-8"><h1 class="titlebod">RecipeEase</h1></div>
                    </div>
                    <div class="col-md-12 pt-5">
                        <p class="texto">Bienvienido a RecipeEase, el chatbot de cocina para facilitarte a la hora de cocinar <?$_SESSION["IdUsuario"]?></p>
                    </div>
                    <div class="col-md-12 pt-4"></div>
                    <div class="col-md-12 pt-5">
                        <p class="texto">!Click en el botón de abajo para empezár¡</p>
                    </div>
                    <div class="row pt-5">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><a href="ChatBot.php"><button class=" buttonBot">Chatbot</button></a></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
</body>
</html>