<?php include 'header.php'; ?>

<?php
$items = 3;
$cost = 5;
$subtotal = $items * $cost;
$tax = ($subtotal / 100) * 12;
$total = $subtotal + $tax;
$best_sellers = ['Nerds', 'Jolly Rancher', 'Snickers', 'M&Ms'];

$count = 1;
echo "<h2>Shopping Cart Items</h2>";
do {
    echo "<p>Item $count: P$cost</p>";
    $count++;
} while($count <= $items);

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
