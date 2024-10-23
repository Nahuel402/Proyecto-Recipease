<?php
    if(isset($_POST)){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "recipeease";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_POST['id'])) {
            if (!empty($_POST['nombre'])) {
                $arrRecet = array();
                $Nom = $_POST['nombre'];
                $query_select = mysqli_query($conn,"SELECT * FROM `recetas recientes` WHERE NomReceta == $nom");
                while($row = mysqli_fetch_array($query_select)){
                    if ($row['NomReceta'] != $Nom) {
                        $arrRecet = mysqli_fetch_assoc($query_select);
                        json_encode($arrRecet, JSON_UNESCAPED_UNICODE)
                    }else{
                        echo "NoData";
                    }
                }
            }
            exit;
        }
    }
?>