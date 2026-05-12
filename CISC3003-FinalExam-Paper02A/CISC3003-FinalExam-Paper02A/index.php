<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'connect.php';

    $name = $_POST['name'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = $_POST['message'];
    $priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);
    $agree = filter_input(INPUT_POST, 'agree', FILTER_VALIDATE_BOOLEAN);

    if (!$agree) {
        die('You must agree to the terms and conditions.');
    }
    if (!$email) {
        die('Invalid email address.');
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message, priority, type, agree) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiii", $name, $email, $message, $priority, $type, $agree);
    $stmt->execute();

    echo "Record inserted successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>
    <h1>Contact</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
        <label for="priority">Priority:</label>
        <select id="priority" name="priority">
            <option value="1">Low</option>
            <option value="2">Medium</option>
            <option value="3">High</option>
        </select><br>
        <fieldset>
            <legend>Type:</legend>
            <label>
                <input type="radio" name="type" value="1" checked> Complaint
            </label>
            <label>
                <input type="radio" name="type" value="2"> Suggestion
            </label>
        </fieldset><br>
        <label>
            <input type="checkbox" name="agree" value="yes" required> I agree to the terms and conditions
        </label><br>
        <button type="submit">Send</button>
    </form>
    <footer>
        <p>CISC3003 Web Programming: DC328563 LANGSIYU 2026</p>
    </footer>
</body>
</html>