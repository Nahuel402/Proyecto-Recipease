<?php
session_start();
$_SESSION["Volver"]=0;
$_SESSION["Registrado"]=0;
header("Location:Index.php");
?>