<?php
require 'connect.php';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (strlen($username) < 3) {
        $error = 'Username too short.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email.';
    } elseif (strlen($password) < 6) {
        $error = 'Password too short.';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $code = bin2hex(random_bytes(16));

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, activation_code) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hash, $code);

        if ($stmt->execute()) {
            $activation_link = "http://localhost/CISC3003-FinalExam-Paper02C/activate.php?code=$code";
            $success = "Signup successful! <a href='$activation_link'>Click here to activate your account</a>";
        } else {
            $error = "Username or email already exists.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>
    <h1>Sign Up</h1>
    <?php if ($error) echo "<p style='color:red'>$error</p>"; ?>
    <?php if ($success) echo "<p style='color:green'>$success</p>"; ?>

    <form method="post" onsubmit="return validateSignup()">
        <label>Username: <input type="text" name="username" id="username" required></label><br>
        <label>Email: <input type="email" name="email" id="email" onblur="checkEmail()" required></label><br>
        <label>Password: <input type="password" name="password" id="password" required></label><br>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have account? <a href="login.php">Login</a></p>

    <script>
    function validateSignup() {
        var u = document.getElementById('username').value.trim();
        var p = document.getElementById('password').value.trim();
        if (u.length < 3) { alert('Username too short'); return false; }
        if (p.length < 6) { alert('Password too short'); return false; }
        return true;
    }

    function checkEmail() {
        var email = document.getElementById('email').value.trim();
        if (!email) return;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_email.php?email=' + encodeURIComponent(email), true);
        xhr.onload = function() {
            if (xhr.responseText === 'taken') {
                alert('Email already registered.');
            }
        };
        xhr.send();
    }
    </script>

    <footer>
        <p>CISC3003 Web Programming: DC328563 LANGSIYU 2026</p>
    </footer>
</body>
</html>