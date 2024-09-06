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
$nada = "";

if(isset($ID)){
        $query = mysqli_query ($conn, "SELECT * FROM usuarios WHERE Email = '$Email' AND Contra = '$Contra' ");
        while ($row = mysqli_fetch_array($query)){
                $_SESSION["Idusuario"] = $row["ID"];
                $_SESSION["Registrado"] = 1;
                $nada = 1;
                header("Location:../pages/Chatbot.php"); 
        }
        if ($nada != 1){
            $_SESSION["error"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Ah ocurrido un error!</strong> La contraseña o el correo electronico son incorrectos.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            header("Location:../pages/acceder.php");  
        }
}   
$conn->close();
?>