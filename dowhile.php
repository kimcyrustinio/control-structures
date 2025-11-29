<?php include 'header.php'; ?>

<?php
// Watches in the cart
$cart_items = [
    'Seiko 5 SNXS79' => 7000,
    'Rolex Starbucks' => 120000,
    'Casio G-Shock' => 5000
];

// Tax rate
$tax_rate = 12;

// Initialize subtotal
$subtotal = 0;

// Display shopping cart using do-while
echo "<h2>Shopping Cart Items</h2>";

$watch_names = array_keys($cart_items);
$count = 0;

do {
    $name = $watch_names[$count];
    $price = $cart_items[$name];
    echo "<p>Item ".($count+1).": $name - P$price</p>";
    $subtotal += $price;
    $count++;
} while($count < count($cart_items));

// Apply discount conditionally
$discount = 0;
if($subtotal > 15000){
    $discount = ($subtotal * 10) / 100; // 10% discount
    echo "<p>Discount Applied: P$discount</p>";
}

$subtotal_after_discount = $subtotal - $discount;

// Calculate tax and total
$tax = ($subtotal_after_discount * $tax_rate) / 100;
$total = $subtotal_after_discount + $tax;

echo "<p>Subtotal: P$subtotal_after_discount</p>";
echo "<p>Tax ($tax_rate%): P$tax</p>";
echo "<p>Total: P$total</p>";

// Best sellers
$best_sellers = ['Rolex Starbucks', 'Patek Philippe Nautilus', 'Seiko SARB'];

echo "<h2>Best Sellers</h2><ul>";
foreach($best_sellers as $watch){
    echo "<li>$watch</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
