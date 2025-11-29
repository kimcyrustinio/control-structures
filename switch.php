<?php include 'header.php'; ?>

<?php
$category = "Chocolates";
$items = 3;
$cost = 5;
$subtotal = $items * $cost;
$tax = ($subtotal / 100) * 12;
$total = $subtotal + $tax;
$best_sellers = ['Nerds', 'Jolly Rancher', 'Snickers', 'M&Ms'];

switch($category){
    case "Gummies":
        echo "<p>Welcome to the Gummies section!</p>";
        break;
    case "Chocolates":
        echo "<p>Welcome to the Chocolates section!</p>";
        break;
    case "Lollipops":
        echo "<p>Welcome to the Lollipops section!</p>";
        break;
    default:
        echo "<p>Check out our other sweets!</p>";
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
