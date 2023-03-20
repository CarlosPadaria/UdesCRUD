<?php
$servername = "localhost";
$database = "udescrud";
$username = "root";
$password = "vertrigo";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Falha na conexão " . mysqli_connect_error());
}

?>