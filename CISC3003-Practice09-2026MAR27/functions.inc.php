<?php
function outputOrderRow($file, $title, $quantity, $price) {
    $amount = $quantity * $price;
    echo '<tr>';
    echo '<td><img src="images/' . htmlspecialchars($file) . '" alt="' . htmlspecialchars($title) . '"></td>';
    echo '<td>' . htmlspecialchars($title) . '</td>';
    echo '<td>' . (int)$quantity . '</td>';
    echo '<td>$' . number_format($price, 2) . '</td>';
    echo '<td>$' . number_format($amount, 2) . '</td>';
    echo '</tr>';
}
?>