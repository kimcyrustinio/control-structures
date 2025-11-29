<?php include 'header.php'; ?>

<?php
// Cart items
$cart_items = [
    'Seiko Sarb' => [15000, 3],
    'Rolex Starbucks' => [250000, 1],
    'Casio G-Shock' => [5000, 2]
];

// Tax rate
$tax_rate = 12;

// Initialize subtotal
$subtotal = 0;

// Display shopping cart
echo "<h2>Shopping Cart</h2>";
foreach($cart_items as $name => [$price, $qty]) {
    $line_total = $price * $qty;
    $subtotal += $line_total;

    $price_formatted = number_format($price, 2);
    $line_total_formatted = number_format($line_total, 2);

    echo "<p>$name - Qty: $qty, Price: P$price_formatted, Line Total: P$line_total_formatted</p>";
}

// Conditional bonuses/discounts using elseif
$special_notes = [];
$total_discount = 0;

foreach($cart_items as $name => [$price, $qty]) {
    if($name == 'Seiko Sarb' && $qty >= 3){
        $special_notes[] = "You get a free watch cleaning kit for buying $qty x $name!";
    } elseif($subtotal > 200000) {
        $special_notes[] = "Big order discount applied: 5% off!";
        $total_discount = ($subtotal * 5) / 100;
    } elseif($subtotal > 100000) {
        $special_notes[] = "You qualify for a free premium watch box!";
    }
}

// Apply discount
$subtotal_after_discount = $subtotal - $total_discount;

// Calculate tax and total
$tax = ($subtotal_after_discount * $tax_rate) / 100;
$total = $subtotal_after_discount + $tax;

echo "<p>Subtotal: P" . number_format($subtotal_after_discount, 2) . "</p>";
echo "<p>Tax ($tax_rate%): P" . number_format($tax, 2) . "</p>";
echo "<p>Total: P" . number_format($total, 2) . "</p>";

// Show special notes
if(!empty($special_notes)){
    echo "<h3>Special Notes</h3><ul>";
    foreach($special_notes as $note){
        echo "<li>$note</li>";
    }
    echo "</ul>";
}

// Best sellers
$best_sellers = ['Rolex Starbucks', 'Patek Philippe Nautilus', 'Seiko Sarb'];

echo "<h2>Best Sellers</h2><ul>";
foreach($best_sellers as $watch){
    echo "<li>$watch</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
