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
$imagen = "";
$nombre = "";
$fecha = "";
$Value = "";
$query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"] . "") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($query)) {
    $imagen = $row["Imagen"];
    $nombre = $row["Nombre"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/recetas.css">
    <title>Historial de Recetas - RecipeEase</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <div class="container mt-5">
    <div class="row">
            <div class="col-12"><br></div>
        </div>
        <h1 class="text-center mb-4">Historial de Recetas</h1>
        <input type="hidden" id="ID" value="<?$_SESSION['IdUsuario']?>">
        <div class="input"><input type="text" id="input-search" class="input-search"><button class="btn-search" id="btn-search">Search</button></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Receta</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" id="Indicación" value = '<?$Value?>'>
                <?php
                $sql = "SELECT NomReceta, Id, fecha FROM `recetas recientes` WHERE Id_usuario = " . $_SESSION["IdUsuario"] . " ORDER BY Id DESC";
                
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idReceta = $row['Id'];
                        $nombreReceta = $row['NomReceta'];
                        $fecha = $row['fecha'];
                        if ($Value == true) {
                            echo "<tr>
                                    <td>$nombreReceta</td>
                                    <td>$fecha</td>
                                    <td class='text-center'>
                                        <a href='receta_detalle.php?id=$idReceta' class='btn btn-custom'>Ver Detalles</a>
                                    </td>
                                </tr>";
                        }else{
                            echo "<tr>
                                    <td id='nom'>$nombreReceta</td>
                                    <td id='fech'>$fecha</td>
                                    <td class='text-center'>
                                        <a href='receta_detalle.php?id=$idReceta' class='btn btn-custom'>Ver Detalles</a>
                                    </td>
                                </tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se han ingresado recetas recientes.</td></tr>";
                }
                ?>
            </tbody>
            
        </table>
        <div class="text-center">
        <a href="ChatBot.php" class="btn btn-custom">Volver al chat</a>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
