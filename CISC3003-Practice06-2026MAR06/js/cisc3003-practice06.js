var subtotal = 0;
for (var i = 0; i < filenames.length; i++) {
    var total = calculateTotal(quantities[i], prices[i]);
    outputCartRow(filenames[i], titles[i], quantities[i], prices[i], total);
    subtotal += total;
}

var tax = subtotal * 0.10;
var shipping = subtotal > 1000 ? 0 : 40;
var grandTotal = subtotal + tax + shipping;

document.write(
    '<tr class="totals"><td colspan="4">Subtotal</td><td>$' + subtotal.toFixed(2) + '</td></tr>' +
    '<tr class="totals"><td colspan="4">Tax</td><td>$' + tax.toFixed(2) + '</td></tr>' +
    '<tr class="totals"><td colspan="4">Shipping</td><td>$' + shipping.toFixed(2) + '</td></tr>' +
    '<tr class="totals focus"><td colspan="4">Grand Total</td><td>$' + grandTotal.toFixed(2) + '</td></tr>'
);