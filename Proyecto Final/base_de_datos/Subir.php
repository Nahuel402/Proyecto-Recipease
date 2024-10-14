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
$Confir= $_POST["confirmar-contraseña"];
$Imagen= "../assets/images/default.png";

$query = mysqli_query ($conn, "SELECT Email FROM usuarios");
while ($row = mysqli_fetch_array($query)){
    if($row["Email"] == $Email){
        $ErrorE = 1;
    }else{
        $EGood = 1;
    }
}
if ($Contra != $Confir){
    $ErrorC = 1 ;
}else{
    $CGood = 1;
}
if(isset($ID)){
        if (isset($ErrorC)){
            $_SESSION["DistC"]= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Ah ocurrido un error!</strong> La contraseña inicializada no es la misma
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $_SESSION["IgualE"] = " ";
            header("Location:../pages/Registrarse.php");
        }elseif(isset($ErrorE) and isset($CGood)){
            $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Ah ocurrido un error!</strong> Existe un usuario con ese correo electronico, Por favór ingrese otro correo.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $_SESSION["DistC"] = " ";
            header("Location:../pages/Registrarse.php");
        }elseif(isset($ErrorE) and isset($ErrorC)) {
            $_SESSION["DistC"]= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Ah ocurrido un error!</strong> La contraseña inicializada no es la misma
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Ah ocurrido un error!</strong> Existe un usuario con ese correo electronico, Por favór ingrese otro correo.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            header("Location:../pages/Registrarse.php");
        }else{
            $_SESSION["IgualE"] = " ";
            $_SESSION["DistC"] = " ";
            $sql = "INSERT INTO usuarios (Nombre,Email,Contra,Imagen) VALUES ('$Nombre', '$Email', '$Contra', '../assets/images/default.png')";
            if($conn->query($sql) == TRUE) {
                $query = mysqli_query($conn, " SELECT ID FROM usuarios WHERE Nombre='$Nombre' AND Contra='$Contra' AND Email='$Email'") or die (mysqli_error($conn));
                while ($row = mysqli_fetch_array($query)){
                    $_SESSION["IdUsuario"] = $row["ID"];
                    $_SESSION["Registrado"]= 1 ;
                    header("Location:../pages/ChatBot.php");
                } 
            }else {
                
            header("Location:../pages/Registrarse.php");
            }
        }
    }


    exit;

$conn->close();
?>