<?php
require 'connect.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc()) {
        $token = bin2hex(random_bytes(16));
        $stmt->close();
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        echo "Reset link: <a href='http://localhost/CISC3003-FinalExam-Paper02C/new_password.php?token=$token'>Click here to reset password</a>";
    } else {
        $message = 'Email not found.';
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Reset Password</title><meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css"></head>
<body>
<h1>Reset Password</h1>
<?php if ($message) echo "<p style='color:red'>$message</p>"; ?>
<form method="post">
    <label>Email: <input type="email" name="email" required></label><br>
    <button type="submit">Send Reset Link</button>
</form>
<footer><p>CISC3003 Web Programming: DC328563 LANGSIYU 2026</p></footer>
</body>
</html>