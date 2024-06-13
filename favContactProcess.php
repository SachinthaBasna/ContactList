<?php 
// echo("OK");
include "connection.php";

$fav = $_POST["star"];

$rs = Database::search("SELECT * FROM `contacts` WHERE `id` = '".$fav."'");




?>