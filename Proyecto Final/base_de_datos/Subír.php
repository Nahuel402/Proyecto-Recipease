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
$Nombre= $_POST["name"];
$Email= $_POST["email"];
$Contra= $_POST["Contra"];
$target_dir="UsuariosImg/";
$Imagen= "";
if(isset($_FILES["img"])){
    if($_FILES["img"]["name"] != ""){
        $target_file = $target_dir.time().basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        $Imagen=$target_file;
    }
}

if(isset($ID)){
    $_SESSION["IdUsuario"] = $ID;
    $sql = "INSERT INTO usuarios ( Nombre, Email, Imagen, Contra) VALUES ('$Nombre', '$Email', '$Imagen', '$Contra')";
}else if(!($Imagen=="")){
    $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Imagen = '$Imagen', Contra = '$Contra' Where ID = '$ID' ";
}else{
    $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Contra = '$Contra' Where ID = '$ID' ";
}

if ($conn->query($sql) === TRUE){
    $_SESSION["Registrado"]= 1 ;
    $_SESSION["Volver"] = 0;
    header("Location:Index.php");
    exit;
} else{
    echo "Error al insetar registro: " . $conn->error;
}

$conn->close();
?>