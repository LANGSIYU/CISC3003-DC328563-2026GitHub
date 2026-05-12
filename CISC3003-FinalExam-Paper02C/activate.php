<?php
require 'connect.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $stmt = $conn->prepare("UPDATE users SET active = 1 WHERE activation_code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Account activated! <a href='login.php'>Login now</a>";
    } else {
        echo "Invalid activation code.";
    }
}
?>