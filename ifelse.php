<?php include 'header.php'; ?>

<?php
// Watches in the cart
$cart_items = [
    'Seiko SARB' => ['price' => 15000, 'qty' => 3, 'img' => 'https://www.abtsaat.com/ProductImages/98497/big/sarb033.jpg'],
    'Rolex Starbucks' => ['price' => 120000, 'qty' => 1, 'img' => 'https://zeitwatches.com/cdn/shop/files/CopyofZeitstockcopy.png?v=1726752983&width=2048'],
    'Casio G-Shock' => ['price' => 5000, 'qty' => 2, 'img' => 'https://www.casio.com/content/dam/casio/product-info/locales/ph/en/timepiece/product/watch/G/GM/gmb/gm-b2100gd-9a/assets/GM-B2100GD-9A.png.transform/main-visual-sp/image.png']
];

// Stock availability
$stock_limit = [
    'Seiko SARB' => 5,
    'Rolex Starbucks' => 2,
    'Casio G-Shock' => 10
];

// Tax rate
$tax_rate = 12;
$subtotal = 0;

// Display shopping cart heading
echo "<h2>Shopping Cart</h2>";

// Start cart grid
echo '<section class="watch-grid">';

foreach($cart_items as $name => $info){
    $price = $info['price'];
    $qty = $info['qty'];
    $img = $info['img'];
    $line_total = $price * $qty;
    $subtotal += $line_total;

    // Stock check
    $stock_status = ($qty <= $stock_limit[$name]) ? "Available" : "Not enough stock!";

    echo '
    <div class="watch-card">
        <img src="' . $img . '" alt="' . $name . '">
        <div class="watch-name">' . $name . '</div>
        <div class="watch-price">₱' . number_format($price) . '</div>
        <div class="watch-qty">Qty: ' . $qty . ' (' . $stock_status . ')</div>
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

// Display totals
echo "<div class='total-box'>";
echo "<p>Subtotal: P" . number_format($subtotal_after_discount) . "</p>";
echo "<p>Tax ($tax_rate%): P" . number_format($tax) . "</p>";
echo "<p>Total: P" . number_format($total) . "</p>";
echo "</div>";

// Special notes
if(!empty($special_notes)){
    echo "<div class='notes-box'><h3>Special Notes</h3><ul>";
    foreach($special_notes as $note){
        echo "<li>$note</li>";
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
foreach($best_sellers as $name => $info){
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
