<?php
$server = "localhost";
$username = "root";
$password = "12345";
$database = "library";

$conn = new mysqli($server, $username, $password, $database);

if (!$conn) {
    die("Conection failure");
}


?>