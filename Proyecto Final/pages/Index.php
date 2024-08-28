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
        include "../includes/windowsalert.php";
        $_SESSION["Volver"] = 0 ;
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
<body>
        <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100 text-center">
            <div class="container BodyIndex">
                <div class="col-lg-12">
                    <h1 class="BodyIndex-title">RecipeEase</h1>
                </div>
                <div class="col-lg-12 BodyIndex-div">
                    <p class="BodyIndex-div-description">Bienvienido a RecipeEase, el chatbot de cocina para facilitarte a la hora de cocinar </p>
                    <p class="BodyIndex-div-description2">!Click en el botón de abajo para empezár¡</p>
                </div>
            </div>
        </div>
</body>
</html>