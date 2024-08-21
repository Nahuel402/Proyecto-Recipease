<?php
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
</head>
<body class = "BodyChat">
        <?php 
        if(isset($_SESSION["Registrado"])){   
                include "../includes/header-ingresado.php";
            }else{
                include "../includes/header.php";
            }
            ?>
        <div class="Chat">
            <div class="row Chat-body >
                <div class="col-md-12 ">
                    <div class="row NomRecet ">
                        <div class="col-md-4 NomRecet ">
                            <div class="col-md-12 Chatbot center">as</div>
                            <div class="col-md-12"> <input type="text" class="mensaje"></div>
                        </div>
                        <div class="col-md-8 NomRecet ">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="col-md-12 NomRecet center">Receta</div>
                                    <div class="col-md-12 center">as</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 center">as</div>
                                    <div class="col-md-12 center">asd</div>-
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>