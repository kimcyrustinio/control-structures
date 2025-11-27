<?php include 'header.php'; ?>

<?php
$best_sellers = ['Nerds', 'Jolly Rancher', 'Snickers', 'M&Ms'];
$items = 3;
$cost = 5;
$subtotal = $items * $cost;
$tax = ($subtotal / 100) * 12;
$total = $subtotal + $tax;

echo "<h2>Best Sellers</h2><ul>";
for($i = 0; $i < count($best_sellers); $i++){
    echo "<li>".$best_sellers[$i]."</li>";
}
echo "</ul>";

echo "<h2>Shopping Cart</h2>";
echo "<p>Items: $items</p>";
echo "<p>Cost per Unit: P$cost</p>";
echo "<p>Subtotal: P$subtotal</p>";
echo "<p>Tax: P$tax</p>";
echo "<p>Total: P$total</p>";
?>

<?php include 'footer.php'; ?>
