<?php
include 'data.inc.php';
include 'functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CISC3003 Practice 09 - My Orders</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include 'header.inc.php'; ?>
<?php include 'left.inc.php'; ?>
<main>
    <header>
        <h4>Order Summaries</h4>
        <p>Examine your customer orders</p>
    </header>
    <section class="order-layout">
        <div class="order-links">
            <h2>My Orders</h2>
            <ul>
                <li><a href="#">Order #500</a></li>
                <li><a href="#">Order #510</a></li>
                <li><a href="#">Order #520</a></li>
                <li><a href="#">Order #530</a></li>
                <li><a href="#">Order #540</a></li>
            </ul>
        </div>
        <div class="order-detail">
            <h2>Selected Order: #520</h2>
            <div class="customer-info">
                Customer: <strong>Mount Royal University</strong>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    outputOrderRow($file1, $title1, $quantity1, $price1);
                    outputOrderRow($file2, $title2, $quantity2, $price2);
                    outputOrderRow($file3, $title3, $quantity3, $price3);
                    outputOrderRow($file4, $title4, $quantity4, $price4);
                    ?>
                </tbody>
                <tfoot>
                    <?php
                    $subtotal = $quantity1 * $price1 + $quantity2 * $price2 + $quantity3 * $price3 + $quantity4 * $price4;
                    $shipping = ($subtotal > 10000) ? 100 : 200;
                    $grandTotal = $subtotal + $shipping;
                    ?>
                    <tr class="totals">
                        <td colspan="4">Subtotal</td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                    <tr class="totals">
                        <td colspan="4">Shipping</td>
                        <td>$<?php echo number_format($shipping, 2); ?></td>
                    </tr>
                    <tr class="grandtotals">
                        <td colspan="4">Grand Total</td>
                        <td>$<?php echo number_format($grandTotal, 2); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>
</body>
</html>