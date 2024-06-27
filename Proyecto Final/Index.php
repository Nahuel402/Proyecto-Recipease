<?php 
    session_start();
    if($_SESSION["Registrado"] <=1 && $_SESSION["Volver"] >=1){
        echo'<div class="window-notice" id="window-notice">
            <div class="content">
                <div class="content-text BotonRegistro">No te has registrado </div>
                <div class="content-buttons"><button Onclick="Alert()" id="close-button">Aceptar</button></div>
            </div>
        </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Cod.js"></script>
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
                    <div class="row">
                        <div class="col-md-4">
                            <a href="">Novedades</a>
                        </div>
                        <div class="col-md-4">
                            <a href="Registrarse.php"><button class="button"> Registrarse</button></a>
                        </div>
                        <div class="col-md-4">
                            <a href="acceder.php"><button class="button">Accerder</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container bodP pt-5">
            <div class="container">
                <div class="row RowP">
                    <div class="col-md-2"></div>
                    <div class="col-md-6 center">
                        <h5><input type="text" class="Buscador BotonRegistro"></h5>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1 BotonRegistro">
                        <h5><button class="button p-2 ">Buscar</button></h5>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="col-md-12"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="Background-color: #A99886">
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
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