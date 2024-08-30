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
$volver= $_POST["Volver"];

if(isset($ID)){
    $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE Email = ".$_Email." AND Contra = ".$Contra."");
    while ($row = mysqli_fetch_array($query)) {
        $_SESSION["Idusuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
     
        header("Location:../pages/Chatbot.php");
    }
}   


if ($Email !== 'email' || $Contra !== 'Contra') {
    $_SESSION['error_message'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
    header('Location: ../pages/acceder.php'); 
    exit();
}
   

$conn->close();
?>