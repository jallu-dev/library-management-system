<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "library";

$conn = new mysqli($server, $username, $password, $database);

if (!$conn) {
    die("Conection failure");
}


?>