<?php include 'header.php'; ?>

<?php
// Watches in the cart
$cart_items = [
    'Seiko SARB' => ['price' => 15000, 'qty' => 3, 'img' => 'https://www.abtsaat.com/ProductImages/98497/big/sarb033.jpg'],
    'Rolex Starbucks' => ['price' => 120000, 'qty' => 1, 'img' => 'https://zeitwatches.com/cdn/shop/files/CopyofZeitstockcopy.png?v=1726752983&width=2048'],
    'Casio G-Shock' => ['price' => 5000, 'qty' => 2, 'img' => 'https://www.casio.com/content/dam/casio/product-info/locales/ph/en/timepiece/product/watch/G/GM/gmb/gm-b2100gd-9a/assets/GM-B2100GD-9A.png.transform/main-visual-sp/image.png']
];

$tax_rate = 12;
$subtotal = 0;

// Display shopping cart heading
echo "<h2>Shopping Cart</h2>";

// Start the cart grid
echo '<section class="watch-grid">';
$watch_names = array_keys($cart_items);
for($i = 0; $i < count($watch_names); $i++){
    $name = $watch_names[$i];
    $price = $cart_items[$name]['price'];
    $qty = $cart_items[$name]['qty'];
    $img = $cart_items[$name]['img'];
    $line_total = $price * $qty;
    $subtotal += $line_total;

    echo '
    <div class="watch-card">
        <img src="' . $img . '" alt="' . $name . '">
        <div class="watch-name">' . $name . '</div>
        <div class="watch-price">₱' . number_format($price) . '</div>
        <div class="watch-qty">Qty: ' . $qty . '</div>
        <div class="watch-line-total">Line Total: ₱' . number_format($line_total) . '</div>
    </div>';
}
echo '</section>';

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
echo "<div class='total-box'>";
echo "<p>Subtotal: P" . number_format($subtotal_after_discount) . "</p>";
echo "<p>Tax ($tax_rate%): P" . number_format($tax) . "</p>";
echo "<p>Total: P" . number_format($total) . "</p>";
echo "</div>";

// Output special notes
if(!empty($special_notes)){
    echo "<div class='notes-box'><h3>Special Notes</h3><ul>";
    for($i = 0; $i < count($special_notes); $i++){
        echo "<li>".$special_notes[$i]."</li>";
    }
    echo "</ul></div>";
}

// Best sellers grid
$best_sellers = [
    'Rolex Starbucks' => ['price' => 120000, 'img' => 'https://zeitwatches.com/cdn/shop/files/CopyofZeitstockcopy.png?v=1726752983&width=2048'],
    'Patek Philippe Nautilus' => ['price' => 2500000, 'img' => 'https://wristaficionado.com/cdn/shop/collections/Patek_Philippe_Nautilus_c4fc6edf-2781-47c2-961b-7ad8d991cd1f_800x800@2x.png?v=1747155843'],
    'Seiko SARB' => ['price' => 15000, 'img' => 'https://www.abtsaat.com/ProductImages/98497/big/sarb033.jpg']
];

echo "<h2>Best Sellers</h2>";
echo '<section class="watch-grid">';
$best_names = array_keys($best_sellers);
for($i = 0; $i < count($best_names); $i++){
    $name = $best_names[$i];
    $info = $best_sellers[$name];
    echo '
    <div class="watch-card">
        <img src="' . $info['img'] . '" alt="' . $name . '">
        <div class="watch-name">' . $name . '</div>
        <div class="watch-price">₱' . number_format($info['price']) . '</div>
    </div>';
}
echo '</section>';
?>

<?php include 'footer.php'; ?>
