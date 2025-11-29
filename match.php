<?php include 'header.php'; ?>

<?php
// Watch selected
$watch_item = "Seiko SARB";

// Watches in cart
$cart_items = [
    'Seiko SARB' => ['price' => 15000, 'qty' => 3],
    'Rolex Starbucks' => ['price' => 120000, 'qty' => 1],
    'Casio G-Shock' => ['price' => 5000, 'qty' => 2]
];

// Tax rate
$tax_rate = 12;

// Initialize subtotal
$subtotal = 0;

// Category using match
$category = match($watch_item){
    'Seiko SARB' => 'Mechanical',
    'Rolex Starbucks' => 'Luxury',
    'Casio G-Shock' => 'Digital',
    default => 'Other'
};

echo "<p>Category of $watch_item: $category</p>";

// Display shopping cart
echo "<h2>Shopping Cart</h2>";
foreach($cart_items as $name => $info){
    $price = $info['price'];
    $qty = $info['qty'];
    $line_total = $price * $qty;
    $subtotal += $line_total;

    echo "<p>$name - Qty: $qty, Price: P" . number_format($price) . "</p>";
    echo "<p>Line Total: P" . number_format($line_total) . "</p>";
}

// Apply discount if subtotal > 15000
$discount = 0;
if($subtotal > 15000){
    $discount = ($subtotal * 10) / 100; // 10% discount
    echo "<p>Discount Applied: P" . number_format($discount) . "</p>";
}

$subtotal_after_discount = $subtotal - $discount;

// Tax and total
$tax = ($subtotal_after_discount * $tax_rate) / 100;
$total = $subtotal_after_discount + $tax;

echo "<p>Subtotal: P" . number_format($subtotal_after_discount) . "</p>";
echo "<p>Tax ($tax_rate%): P" . number_format($tax) . "</p>";
echo "<p>Total: P" . number_format($total) . "</p>";

// Best sellers
$best_sellers = ['Rolex Starbucks', 'Patek Philippe Nautilus', 'Seiko SARB'];

echo "<h2>Best Sellers</h2><ul>";
foreach($best_sellers as $watch){
    echo "<li>$watch</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
