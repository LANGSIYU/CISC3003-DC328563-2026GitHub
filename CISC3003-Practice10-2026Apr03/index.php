<?php
// CISC3003 Practice 10
// Student ID: DC328563
// Student Name: RACHEL

$studentId = 'DC328563';
$studentName = 'RACHEL';
$sha256Hash = hash('sha256', $studentName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC328563 RACHEL PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        pre {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            overflow-x: auto;
        }
        .hash {
            background-color: #e8f4f8;
            padding: 10px;
            border-left: 4px solid #3498db;
            margin-top: 20px;
        }
        .links {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        .links a {
            display: inline-block;
            margin-right: 15px;
            color: #3498db;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>RACHEL PHP</h1>

    <h2>ASCII Art - First Letter of Name (R)</h2>
    <pre>
    RRRRR
    R    R
    R    R
    RRRRR
    R  R
    R   R
    R    R
    </pre>

    <div class="hash">
        <strong>SHA256 Hash of "RACHEL":</strong><br>
        <?php echo $sha256Hash; ?>
    </div>

    <div class="links">
        <br>
        <a href="fail.php">fail.php (error page)</a><br>
        <a href="check.php">check.php</a>
    </div>
</div>
</body>
</html>