<?php
// This file is intentionally broken to produce an error
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fail Page</title>
</head>
<body>
<p>This page should show a PHP error:</p>
<?php
this_function_does_not_exist();
?>
</body>
</html>