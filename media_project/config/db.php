<?php
$conn = new mysqli("localhost", "root", "", "ngo_media");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>