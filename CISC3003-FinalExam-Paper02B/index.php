<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $msg = htmlspecialchars($_POST['message']);

    if ($name && $email && $msg) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your@gmail.com';
            $mail->Password = 'your-app-password';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom($email, $name);
            $mail->addAddress('your@gmail.com');
            $mail->Subject = 'Contact Form Message';
            $mail->Body = "Name: $name\nEmail: $email\n\n$msg";

            $mail->send();

            header('Location: index.php?success=1');
            exit;
        } catch (Exception $e) {
            $message = "Error: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Please fill all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>
    <h1>Contact Us</h1>

    <?php if (isset($_GET['success'])): ?>
        <p style="color:green"><strong>Email sent successfully!</strong></p>
    <?php endif; ?>

    <?php if ($message): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form method="post" action="" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea><br>

        <button type="submit">Send</button>
    </form>

    <script>
    function validateForm() {
        var name = document.getElementById('name').value.trim();
        var email = document.getElementById('email').value.trim();
        var msg = document.getElementById('message').value.trim();
        if (!name || !email || !msg) {
            alert('All fields are required.');
            return false;
        }
        return true;
    }
    </script>

    <footer>
        <p>CISC3003 Web Programming: DC328563 LANGSIYU 2026</p>
    </footer>
</body>
</html>