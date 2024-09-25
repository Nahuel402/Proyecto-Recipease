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
$query2 = mysqli_query ($conn, "SELECT * FROM usuarios WHERE Email = '$Email' AND Contra = '$Contra' ");
while ($row2 = mysqli_fetch_array($query2)){
    if ($row2["Email"] == $Email and $row2["Contra"] == $Contra) {
        $GoodI=1;
    }
}
if(isset($ID)){
    if (isset($GoodI)) {
        $query = mysqli_query ($conn, "SELECT * FROM usuarios WHERE Email = '$Email' AND Contra = '$Contra' ");
        while ($row = mysqli_fetch_array($query)){
                $_SESSION["IdUsuario"] = $row["ID"];
                $_SESSION["Registrado"] = 1;
                $nada = 1;
                header("Location:../pages/Chatbot.php"); 
        }
    }else{
        $_SESSION["error"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>Ah ocurrido un error!</strong> La contraseña o el correo electronico son incorrectos.
                                Si no se ah registrado aun, por favór registrese.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
        header("Location:../pages/acceder.php"); 
    }
}   
$conn->close();
?>