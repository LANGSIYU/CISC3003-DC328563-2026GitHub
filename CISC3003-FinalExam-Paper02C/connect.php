<?php
$conn = new mysqli('localhost', 'root', '', 'finalexam_c', 3307);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>