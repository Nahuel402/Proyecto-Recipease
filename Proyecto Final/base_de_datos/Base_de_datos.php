<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlCB = "CREATE DATABASE recipease";

/*

PORFA NO BORRAR, ESTÓY INTENTANDO QUE SI LA BASE DE DATOS NO SE CREÓ QUE SE CREE UNA

*/
?>