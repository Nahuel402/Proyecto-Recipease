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
$ID = $_POST["Registrar"];
$Email= $_POST["email"];
$Contra= $_POST["Contra"];

if(isset($ID)){
    $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE Email = ".$_Email." AND Contra = ".$Contra."");
    while ($row = mysqli_fetch_array($query)) {
        $_SESSION["Idusuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
        header("Location:Index.php");
    }
}else{
    $_SESSION["Error"] = 1;
    header("Location:Index.php");
}

$conn->close();
?>