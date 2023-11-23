<?php
// send_coin.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../_db.php");
    
    $coinType = $_POST['coin_name'];
    $amount = $_POST['amount'];
    $wallet = $_POST['wallet'];
    $network = $_POST['network'];
    $userid = $_POST['userid']; // Assuming you have the user's ID sent from the form

    // Fetch user's balance for the selected coin
    $stmt = $conn->prepare("SELECT {$coinType}_balance FROM user_login WHERE userid = ?");
    if ($stmt) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $stmt->bind_result($userCoinBalance);
        $stmt->fetch();
        $stmt->close();

        if ($amount <= $userCoinBalance) {
            // Process the transaction, deduct from user's balance, etc.
            // Your transaction handling code here...
            echo '<script>alert ("Sorry, Something went wrong during the transfer process, Chat our Customer Support!!")</script>';
            echo '<script>window.location="send"</script>';
            // header('location:send');

        } else {
            // Insufficient balance, show warning
            echo '<script>alert ("Insufficient balance!!")</script>';
            echo '<script>window.location="send"</script>';
            // header('location:send');
        }
    } else {
        // Handle prepare statement error
        echo "Prepare statement error: " . $conn->error;
    }
}
?>
