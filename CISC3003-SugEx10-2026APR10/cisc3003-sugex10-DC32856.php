<?php
include 'includes/book-utilities.inc.php';

$customers = readCustomers('data/customers.txt');
$selectedCustomerId = isset($_GET['customer']) ? $_GET['customer'] : null;
$selectedCustomer = null;
$orders = [];

if ($selectedCustomerId) {
    foreach ($customers as $cust) {
        if ($cust['id'] == $selectedCustomerId) {
            $selectedCustomer = $cust;
            break;
        }
    }
    $orders = readOrders($selectedCustomerId, 'data/orders.txt');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DC328563 LANG SIYU (RACHEL)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/demo-styles.css">
    <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/jquery.sparkline.2.1.2.js"></script>
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">

              <div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Customers</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <table class="mdl-data-table  mdl-shadow--2dp">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">Name</th>
                          <th class="mdl-data-table__cell--non-numeric">University</th>
                          <th class="mdl-data-table__cell--non-numeric">City</th>
                          <th>Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($customers as $c): ?>
                        <tr>
                          <td class="mdl-data-table__cell--non-numeric">
                            <a href="?customer=<?= urlencode($c['id']) ?>">
                              <?= htmlspecialchars($c['firstName'] . ' ' . $c['lastName']) ?>
                            </a>
                          </td>
                          <td class="mdl-data-table__cell--non-numeric"><?= htmlspecialchars($c['university']) ?></td>
                          <td class="mdl-data-table__cell--non-numeric"><?= htmlspecialchars($c['city']) ?></td>
                          <td>
                            <span class="sparkline" data-values="<?= htmlspecialchars($c['sales']) ?>">Loading...</span>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>
              
              
            <div class="mdl-grid mdl-cell--5-col">
    

       
                  <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Customer Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <?php if ($selectedCustomer): ?>
                        <h3><?= htmlspecialchars($selectedCustomer['firstName'] . ' ' . $selectedCustomer['lastName']) ?></h3>
                        <p><strong>Email:</strong> <?= htmlspecialchars($selectedCustomer['email']) ?></p>
                        <p><strong>University:</strong> <?= htmlspecialchars($selectedCustomer['university']) ?></p>
                        <p><strong>Address:</strong> <?= htmlspecialchars($selectedCustomer['address']) ?></p>
                        <p><strong>City:</strong> <?= htmlspecialchars($selectedCustomer['city']) ?></p>
                        <p><strong>State:</strong> <?= htmlspecialchars($selectedCustomer['state']) ?></p>
                        <p><strong>Country:</strong> <?= htmlspecialchars($selectedCustomer['country']) ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($selectedCustomer['phone']) ?></p>
                        <?php else: ?>
                        <p>Select a customer to view details.</p>
                        <?php endif; ?>
                    </div>    
                  </div>

                  <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Order Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">       
                               <table class="mdl-data-table  mdl-shadow--2dp">
                              <thead>
                                <tr>
                                  <th class="mdl-data-table__cell--non-numeric">Cover</th>
                                  <th class="mdl-data-table__cell--non-numeric">ISBN</th>
                                  <th class="mdl-data-table__cell--non-numeric">Title</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $order): ?>
                                <?php 
                                    $isbnImage = 'images/tinysquare/' . $order['isbn'] . '.jpg';
                                    if (!file_exists($isbnImage)) {
                                        $isbnImage = 'images/android-desktop.png';
                                    }
                                ?>
                                <tr>
                                  <td class="mdl-data-table__cell--non-numeric">
                                    <img src="<?= htmlspecialchars($isbnImage) ?>" width="40" alt="Book Cover">
                                  </td>
                                  <td class="mdl-data-table__cell--non-numeric"><?= htmlspecialchars($order['isbn']) ?></td>
                                  <td class="mdl-data-table__cell--non-numeric"><?= htmlspecialchars($order['title']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                  <td colspan="3" class="mdl-data-table__cell--non-numeric">
                                    <?= $selectedCustomerId ? 'No orders found for this customer.' : 'Select a customer to see orders.' ?>
                                  </td>
                                </tr>
                                <?php endif; ?>
                              </tbody>
                            </table>
                        </div>    
                   </div>

               </div>   
           
           
            </div>

        </section>
        <footer style="text-align:center; padding:20px; background-color:#f5f5f5; margin-top:20px; border-top:1px solid #e0e0e0;">
            CISC3003 Web Programming: DC328563 LANG SIYU (RACHEL) 2026
        </footer>
    </main>    
</div>

<script>
$(document).ready(function(){
    $('.sparkline').each(function(){
        var vals = $(this).data('values').split(',').map(Number);
        $(this).sparkline(vals, { type: 'bar', barColor: '#2196F3', height: '20px', barWidth: 4, barSpacing: 1 });
    });
});
</script>
          
</body>
</html>