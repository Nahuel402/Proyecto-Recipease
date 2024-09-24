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
$ID = $_SESSION["IdUsuario"];
$Nombre= $_POST["name"];
$Email= $_POST["email"];
$Contra= $_POST["Contra"];
$Confir= $_POST["confirmar-contraseña"];
$target_dir="../assets/images/";
$Imagen =$_FILES['imagen'];

if(isset($_SESSION["IdUsuario"])){
    $sql = "UPDATE usuarios set Nombre = '$Nombre', Email = '$Email', Contra = '$Contra', Imagen = '$Imagen' Where ID = '$ID' ";
    header("Location:../pages/ChatBot.php");
}
if(isset($_FILES["imagen"])){
    if($_FILES["imagen"]["name"] != ""){
        $target_file = $target_dir.time().basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $Imagen=$target_file;
        $sql = "UPDATE usuarios set Imagen = '$Imagen' Where ID = '$ID' ";
   
    
    }
}

if ($conn->query($sql) === TRUE){
    if (isset($Error)){
        $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>Ah ocurrido un error!</strong> Existe un usuario con ese correo electronico, Por favór ingrese otro correo.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
        $_SESSION["DistC"]= "";
        header("Location:../pages/Registrarse.php");
    }
    else{
        $_SESSION["IgualE"]="";
        $query = mysqli_query($conn, " SELECT * FROM usuarios WHERE Nombre='$Nombre' AND Contra='$Contra' AND Email='$Email' AND Imagen='$Imagen'") or die (mysqli_error($conn));
        while ($row = mysqli_fetch_array($query)){
            $_SESSION["IdUsuario"] = $row["ID"];
            $_SESSION["Registrado"]= 1 ;
            header("Location:../pages/ChatBot.php");
        } 
    }
    exit;
}
$conn->close();
?>