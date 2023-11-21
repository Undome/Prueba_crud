<?php
    if ( !isset($_GET["id"]) ) {
        $id = $_GET["id"];
        $servername = "";
        $username = "u373289608_dantech";
        $password = "p/8BilzU";
        $database = "u373289608_crudprueba"; 

        $connection = new mysqli("$servername, $username, $password, $database");

        $sql = "DELETE FROM clients WHERE id = $id";

        $connection->query($sql);
    }

    header("location: /Prueba_crud/index.php")
    exit;
?>