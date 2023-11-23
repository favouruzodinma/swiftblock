<?php
// fund.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../_db.php");

    $coinType = $_POST['coin_name'];
    $amountValue = $_POST['amount_value'];
    $amountUSD = $_POST['amount_usd'];
    $wallet = $_POST['wallet'];

    // Assuming you have a user identifier (e.g., user ID or email) to identify the user
    $userid = $_POST['userid']; // Replace this with the actual user identifier

    // Check if amount-value and amount-usd are strictly equal
    if ($amountValue === $amountUSD) {
        // Update user's balance in the user_login table based on the coin type
        $updateQuery = "UPDATE user_login SET {$coinType}_balance = {$coinType}_balance + ? WHERE userid = ?";
        $stmt = $conn->prepare($updateQuery);

        if ($stmt) {
            $stmt->bind_param("is", $amountValue, $userid);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "User's balance updated successfully!";
            } else {
                echo "No rows were updated!";
            }

            $stmt->close();
        } else {
            echo "Prepare statement error: " . $conn->error;
        }
    } else {
        echo "Amount-value and amount-usd must be strictly equal!";
    }
}
?>
