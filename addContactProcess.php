<?php

include "connection.php";
// echo("Ok machang 👍")
$name = $_POST["n"];
$email = $_POST["e"];
$phone = $_POST["p"];

// echo($name. $email . $phone);

$rs = Database::search("SELECT * FROM `contacts`");
$num = $rs->num_rows;
if (empty($name)) {
    echo ("Please enter name to save your contact");
}
if (empty($phone)) {
    echo ("Please Enter Phone number");
} else if (empty($email)) {
    echo ("Please Enter Email Address");
} else if (empty($phone)) {
    echo ("error");
} else if (strlen($phone) > 10) {
    echo ("Please Enter valid phone number: your mobile has than 10 numbers");
} else if (!is_numeric($phone)) {
    echo ("Please Enter valid phone number");
} else {
    Database::iud("INSERT INTO `contacts`(`name`, `email`, `phone`) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "')");
    echo ("Success");
}