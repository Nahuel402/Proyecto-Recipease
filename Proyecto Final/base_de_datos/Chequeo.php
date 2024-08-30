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
    if(isset($Email)){
        $query = mysqli_query ($conn, " SELECT * FROM usuarios WHERE Email == ".$Email." && Contra == ".$Contra."") or die (mysqli_error($conn));
        while ($row = mysqli_fetch_array($query)){
            if ($Email != $row["Email"] || $Contra != $row['Contra']) {
                $_SESSION['error_message'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Oye!</strong> Has tenído un problema con tu inicio de sessión, intenta de nuevo.<br>
                    No te has registrado? <a href = 'Registrarse.php' class = 'BotRegistro'>Has click aquí</a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                header('Location: ../pages/acceder.php'); 
                exit();
            }else{
                $_SESSION["Idusuario"] = $row["ID"];
                $_SESSION["Registrado"] = 1;
                header("Location:../pages/Chatbot.php"); 
                exit();
            }
        }
}   }



   

$conn->close();
?>