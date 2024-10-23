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
$_SESSION["site"] = "historial.php";

// Obtener datos del usuario
$idUsuario = $_SESSION["IdUsuario"];
$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE ID = $idUsuario") or die(mysqli_error($conn));
$imagen = $nombre = "";
if ($row = mysqli_fetch_array($query)) {
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
    <link rel="stylesheet" href="../assets/css/recetassss.css">
    <title>Historial de Recetas - RecipeEase</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Historial de Recetas</h1>

        <div class="input mb-3">
            <input type="text" id="input-search" class="input-search" placeholder="Buscar receta...">
            <button class="btn-search" id="btn-search">Search</button>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Receta</th>
                    <th>Fecha</th>
                    <th>Fav</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="resultados">
                <?php
                $sql = "SELECT r.Id, r.NomReceta, r.fecha, 
                               IF(rf.Id_receta IS NOT NULL, 1, 0) AS esFavorito
                        FROM `recetas recientes` r
                        LEFT JOIN `receta favorita` rf 
                        ON r.Id = rf.Id_receta AND rf.Id_usuario = $idUsuario
                        WHERE r.Id_usuario = $idUsuario
                        ORDER BY r.Id DESC";

                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idReceta = $row['Id'];
                        $nombreReceta = $row['NomReceta'];
                        $fecha = $row['fecha'];
                        $esFavorito = $row['esFavorito'];

                        $iconoCorazon = $esFavorito ? '../assets/images/corazon.png' : '../assets/images/corazonvacio.png';
                        $claseFavorito = $esFavorito ? 'red' : '';

                        echo "<tr>
                                <td>$nombreReceta</td>
                                <td>$fecha</td>
                                <td>
                                    <button class='favorite' onclick='toggleHeart(this)'>
                                        <img class='favorite-btn $claseFavorito' src='$iconoCorazon' id='favorite-$idReceta' alt='Heart'>
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <a href='receta_detalle.php?id=$idReceta'>
                                        <button class='btn btn-custom'>Ver Detalles</button>
                                    </a>
                                    <a href='../base_de_datos/deleteRecipe.php?id=$idReceta'>
                                        <button class='btn btn-custom' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta receta del historial?\")'>
                                            Borrar Receta
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No se han ingresado recetas recientes.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="ChatBot.php" class="btn btn-custom">Volver al chat</a>
        </div>
    </div>

    <script>
        document.getElementById('input-search').addEventListener('input', function () {
            const query = this.value;
            const userId = <?php echo $idUsuario; ?>;

            if (query.length > 0) {
                fetch(`../base_de_datos/buscar_receta.php?q=${query}&user=${userId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('resultados').innerHTML = data;
                    })
                    .catch(error => console.error('Error en la búsqueda:', error));
            } else {
                location.reload();  // Recargar si no hay búsqueda activa
            }
        });
    </script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
