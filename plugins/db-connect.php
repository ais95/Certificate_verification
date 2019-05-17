<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "itpal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("<p>Database <b><i>$database</i></b> couldn't found</p> " . $conn->connect_error);
} 


?>