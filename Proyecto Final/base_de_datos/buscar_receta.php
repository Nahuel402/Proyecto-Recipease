<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_de_datos = 'recipeease';
$conn = new mysqli($host, $usuario, $password, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$query = $_GET['q'] ?? '';
$idUsuario = $_GET['user'] ?? 0;

if (!empty($query) && $idUsuario > 0) {
    $sql = "SELECT r.Id, r.NomReceta, r.fecha, 
                   IF(rf.Id_receta IS NOT NULL, 1, 0) AS esFavorito
            FROM `recetas recientes` r
            LEFT JOIN `receta favorita` rf 
            ON r.Id = rf.Id_receta AND rf.Id_usuario = ?
            WHERE r.Id_usuario = ? AND r.NomReceta LIKE ?
            ORDER BY r.Id DESC";
    
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param('iis', $idUsuario, $idUsuario, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $iconoCorazon = $row['esFavorito'] ? '../assets/images/corazon.png' : '../assets/images/corazonvacio.png';
            $claseFavorito = $row['esFavorito'] ? 'red' : '';

            echo "<tr>
                    <td>{$row['NomReceta']}</td>
                    <td>{$row['fecha']}</td>
                    <td>
                        <img class='favorite-btn $claseFavorito' src='$iconoCorazon' alt='Heart'>
                    </td>
                    <td class='text-center'>
                        <a href='receta_detalle.php?id={$row['Id']}'><button class='btn btn-custom'>Ver Detalles</button></a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4' class='text-center'>No se encontraron recetas.</td></tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>Parámetros de búsqueda inválidos.</td></tr>";
}
?>
