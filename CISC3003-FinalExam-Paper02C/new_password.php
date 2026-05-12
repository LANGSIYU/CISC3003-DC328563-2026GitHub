<?php
require 'connect.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    
    if ($stmt->get_result()->fetch_assoc()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->close();
            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
            $stmt->bind_param("ss", $password, $token);
            $stmt->execute();
            echo "<p>Password updated! <a href='login.php'>Login</a></p>";
        } else {
            echo '<form method="post">
                <label>New Password: <input type="password" name="password" required></label><br>
                <button type="submit">Reset Password</button>
            </form>';
        }
    } else {
        echo "<p>Invalid or expired token.</p>";
    }
}
?>