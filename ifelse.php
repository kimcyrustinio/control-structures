<?php include 'header.php'; ?>

<?php
$items = 3;
$stock = 5;
$cost = 5;
$subtotal = $items * $cost;
$tax = ($subtotal / 100) * 12;
$total = $subtotal + $tax;
$best_sellers = ['Nerds', 'Jolly Rancher', 'Snickers', 'M&Ms'];

if($items <= $stock){
    echo "<p>Items are available for purchase.</p>";
} else {
    echo "<p>Sorry, not enough stock.</p>";
}

echo "<h2>Shopping Cart</h2>";
echo "<p>Items: $items</p>";
echo "<p>Cost per Unit: P$cost</p>";
echo "<p>Subtotal: P$subtotal</p>";
echo "<p>Tax: P$tax</p>";
echo "<p>Total: P$total</p>";

echo "<h2>Best Sellers</h2><ul>";
foreach($best_sellers as $candy){
    echo "<li>$candy</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
