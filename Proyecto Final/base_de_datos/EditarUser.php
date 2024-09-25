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
$Editar= $_POST["Editar"];
$ID = $_SESSION["IdUsuario"];
$Nombre= $_POST["name"];
$Email= $_POST["email"];
$Contra= $_POST["Contra"];
$target_dir="../assets/images/";
$Imagen = "";
$ImagenB = "";

if(isset($_FILES["imagen"])){
    if($_FILES["imagen"]["name"] != ""){
        $target_file = $target_dir.time().basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $Imagen=$target_file;
    }
}

$query = mysqli_query($conn, " SELECT * FROM usuarios WHERE ID = '$ID'") or die (mysqli_error($conn));
while ($row = mysqli_fetch_array($query)){
    $row["Imagen"]=$ImagenB;
}
if(isset($Editar)){
        if(isset($Imagen)){
                if ($ImagenB == $Imagen){
                    $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Contra = '$Contra' Where ID = '$ID' ";  
                }else{
                    $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Contra = '$Contra', Imagen = '$Imagen' Where ID = '$ID' "; 
                }
        }else{
            $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Contra = '$Contra' Where ID = '$ID' ";  
        }
        if ($conn->query($sql) == TRUE) {
            header("Location:../pages/ChatBot.php");
        }    
    }
    exit;

$conn->close();
?>