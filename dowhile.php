<?php include 'header.php'; ?>

<?php
// Watches in the cart
$cart_items = [
    'Seiko SARB' => ['price' => 15000, 'qty' => 3],
    'Rolex Starbucks' => ['price' => 120000, 'qty' => 1],
    'Casio G-Shock' => ['price' => 5000, 'qty' => 2]
];

// Tax rate
$tax_rate = 12;

// Initialize subtotal
$subtotal = 0;

// Display shopping cart using do-while
echo "<h2>Shopping Cart</h2>";

$watch_names = array_keys($cart_items);
$count = 0;

do {
    $name = $watch_names[$count];
    $price = $cart_items[$name]['price'];
    $qty = $cart_items[$name]['qty'];
    $line_total = $price * $qty;
    $subtotal += $line_total;

    echo "<p>$name - Qty: $qty, Price: P" . number_format($price) . ", Line Total: P" . number_format($line_total) . "</p>";

    $count++;
} while($count < count($cart_items));

// Apply discounts
$discount = 0;
$special_notes = [];

if($cart_items['Seiko SARB']['qty'] >= 3){
    $special_notes[] = "You get a free watch cleaning kit for buying 3 x Seiko SARB!";
}

if($subtotal > 100000){
    $discount = ($subtotal * 5) / 100; // 5% big order discount
    $special_notes[] = "Big order discount applied: 5% off!";
}

$subtotal_after_discount = $subtotal - $discount;

// Tax and total
$tax = ($subtotal_after_discount * $tax_rate) / 100;
$total = $subtotal_after_discount + $tax;

// Output totals
echo "<p>Subtotal: P" . number_format($subtotal_after_discount) . "</p>";
echo "<p>Tax ($tax_rate%): P" . number_format($tax) . "</p>";
echo "<p>Total: P" . number_format($total) . "</p>";

// Output special notes
if(!empty($special_notes)){
    echo "<h3>Special Notes</h3><ul>";
    foreach($special_notes as $note){
        echo "<li>$note</li>";
    }
    echo "</ul>";
}

// Best sellers
$best_sellers = ['Rolex Starbucks', 'Patek Philippe Nautilus', 'Seiko SARB'];

echo "<h2>Best Sellers</h2><ul>";
foreach($best_sellers as $watch){
    echo "<li>$watch</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
