<?php

$name = $_POST['name'];
$message = $_POST['message'];  
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, 'agree', FILTER_VALIDATE_BOOLEAN);  

if (!$terms) {
    die('You must agree to the terms and conditions.');
}

var_dump($name, $message, $priority, $type, $terms);