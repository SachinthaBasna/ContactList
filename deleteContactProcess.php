<?php 
    include "connection.php";
    $id = $_POST["id"];

    Database::search("SELECT * FROM `contacts` WHERE `id` = '".$id."'");
    
    Database::iud("DELETE FROM `contacts` WHERE `id` = '".$id."'");

?>