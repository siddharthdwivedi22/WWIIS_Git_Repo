<?php
$servername = "localhost";
$serverusername = "sid";
$serverpassword = "sdgangsta21";
$dbname = "technicalchallenge";

$conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>