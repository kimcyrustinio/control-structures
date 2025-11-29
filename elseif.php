<?php include 'header.php'; ?>

<?php
// Our watch cart
$watches = [
    'Seiko Sarb' => [15000, 3],
    'Rolex Starbucks' => [250000, 1],
    'Casio G-Shock' => [5000, 2]
];

$taxPercent = 12;
$subtotal = 0;

// Show cart items
echo "<h2>Shopping Cart</h2>";
foreach ($watches as $watch => $info) {
    $price = $info[0];
    $qty = $info[1];
    $lineTotal = $price * $qty;
    $subtotal += $lineTotal;

    echo "<p>$watch - Qty: $qty, Price: P" . number_format($price) . ", Line Total: P" . number_format($lineTotal) . "</p>";
}

// Special notes & discounts
$notes = [];
$discount = 0;

// Give free cleaning kit if buying 3 or more Seiko Sarb
if (isset($watches['Seiko Sarb']) && $watches['Seiko Sarb'][1] >= 3) {
    $notes[] = "Free watch cleaning kit for buying {$watches['Seiko Sarb'][1]} x Seiko Sarb!";
}

// Apply order-level discounts
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
echo "<p>Subtotal: P" . number_format($totalAfterDiscount) . "</p>";
echo "<p>Tax ($taxPercent%): P" . number_format($tax) . "</p>";
echo "<p>Total: P" . number_format($total) . "</p>";

// Show special notes if any
if (!empty($notes)) {
    echo "<h3>Notes</h3><ul>";
    foreach ($notes as $note) {
        echo "<li>$note</li>";
    }
    echo "</ul>";
}

// Some popular watches
$topWatches = ['Rolex Starbucks', 'Patek Philippe Nautilus', 'Seiko Sarb'];
echo "<h2>Best Sellers</h2><ul>";
foreach ($topWatches as $w) {
    echo "<li>$w</li>";
}
echo "</ul>";
?>

<?php include 'footer.php'; ?>
