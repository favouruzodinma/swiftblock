<?php
// fund.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../_db.php");

    // Assuming you have proper validation for user input
    $coinType = $_POST['coin_name'];
    $amountValue = $_POST['amount_value'];
    $amountUSD = $_POST['amount_usd'];
    $wallet = $_POST['wallet'];
    $userid = $_POST['userid']; // Replace this with the actual user identifier (user ID, email, etc.)

    // Check if amount-value and amount-usd are strictly equal
    if ($amountValue === $amountUSD) {
        // Update user's balance in the user_login table based on the coin type
        $updateQuery = "UPDATE user_login SET {$coinType}_balance = {$coinType}_balance + ? WHERE userid = ?";
        $stmt = $conn->prepare($updateQuery);

        if ($stmt) {
            $stmt->bind_param("ds", $amountValue, $userid);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "User's balance updated successfully!";
                header('location:'.$_SERVER["HTTP_REFERER"]);

            } else {
                echo "No rows were updated!";
                header('location:'.$_SERVER["HTTP_REFERER"]);

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
