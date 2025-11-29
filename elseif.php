<?php include 'header.php'; ?>

<?php
// Our watch cart
$watches = [
    'Seiko SARB' => ['price' => 15000, 'qty' => 3, 'img' => 'https://www.abtsaat.com/ProductImages/98497/big/sarb033.jpg'],
    'Rolex Starbucks' => ['price' => 250000, 'qty' => 1, 'img' => 'https://zeitwatches.com/cdn/shop/files/CopyofZeitstockcopy.png?v=1726752983&width=2048'],
    'Casio G-Shock' => ['price' => 5000, 'qty' => 2, 'img' => 'https://www.casio.com/content/dam/casio/product-info/locales/ph/en/timepiece/product/watch/G/GM/gmb/gm-b2100gd-9a/assets/GM-B2100GD-9A.png.transform/main-visual-sp/image.png']
];

$taxPercent = 12;
$subtotal = 0;

// Display cart heading
echo "<h2>Shopping Cart</h2>";

// Start the cart grid
echo '<section class="watch-grid">';
foreach ($watches as $name => $info) {
    $price = $info['price'];
    $qty = $info['qty'];
    $img = $info['img'];
    $lineTotal = $price * $qty;
    $subtotal += $lineTotal;

    echo '
    <div class="watch-card">
        <img src="' . $img . '" alt="' . $name . '">
        <div class="watch-name">' . $name . '</div>
        <div class="watch-price">₱' . number_format($price) . '</div>
        <div class="watch-qty">Qty: ' . $qty . '</div>
        <div class="watch-line-total">Line Total: ₱' . number_format($lineTotal) . '</div>
    </div>';
}
echo '</section>';

// Special notes & discounts
$notes = [];
$discount = 0;

// Free cleaning kit for Seiko SARB
if (isset($watches['Seiko SARB']) && $watches['Seiko SARB']['qty'] >= 3) {
    $notes[] = "Free watch cleaning kit for buying {$watches['Seiko SARB']['qty']} x Seiko SARB!";
}

// Order-level discounts
if ($subtotal > 200000) {
    $notes[] = "Big order discount! 5% off your total.";
    $discount = $subtotal * 0.05;
} elseif ($subtotal > 100000) {
    $notes[] = "Congrats! You get a premium watch box.";
}

$totalAfterDiscount = $subtotal - $discount;
$tax = $totalAfterDiscount * ($taxPercent / 100);
$total = $totalAfterDiscount + $tax;

// Display totals
echo "<div class='total-box'>";
echo "<p>Subtotal: ₱" . number_format($totalAfterDiscount) . "</p>";
echo "<p>Tax ($taxPercent%): ₱" . number_format($tax) . "</p>";
echo "<p>Total: ₱" . number_format($total) . "</p>";
echo "</div>";

// Display special notes
if (!empty($notes)) {
    echo "<div class='notes-box'><h3>Notes</h3><ul>";
    foreach ($notes as $note) {
        echo "<li>$note</li>";
    }
    echo "</ul></div>";
}

// Best Sellers with grid
$best_sellers = [
    'Rolex Starbucks' => ['price' => 250000, 'img' => 'https://zeitwatches.com/cdn/shop/files/CopyofZeitstockcopy.png?v=1726752983&width=2048'],
    'Patek Philippe Nautilus' => ['price' => 2500000, 'img' => 'https://wristaficionado.com/cdn/shop/collections/Patek_Philippe_Nautilus_c4fc6edf-2781-47c2-961b-7ad8d991cd1f_800x800@2x.png?v=1747155843'],
    'Seiko SARB' => ['price' => 15000, 'img' => 'https://www.abtsaat.com/ProductImages/98497/big/sarb033.jpg']
];

echo "<h2>Best Sellers</h2>";
echo '<section class="watch-grid">';
foreach ($best_sellers as $name => $info) {
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
