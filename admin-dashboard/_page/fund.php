<?php
// Assuming a form submission triggers this code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection (consider improving this by using a separate file)
    require_once('../../_db.php'); // Replace '_db.php' with your actual database connection file

    // Retrieve form data
    $selectedCoin = $_POST['network'] ?? '';
    $value = $_POST['value'] ?? 0;
    $usdValue = $_POST['usd'] ?? 0;
    $walletAddress = $_POST['wallet'] ?? '';

    // Example token coins and their database column names
    $tokenCoins = [
        'bitcoin' => 'bitcoin_balance_column',
        'ethereum' => 'ethereum_balance_column',
        'tron' => 'tron_balance_column',
        'usdt(trc20)' => 'usdt_trc20_balance_column',
        'usdt(erc20)' => 'usdt_erc20_balance_column'
        // Add more token coins and their corresponding database column names as needed
    ];

    // Check if the selected coin exists in the token coins array
    if (array_key_exists($selectedCoin, $tokenCoins)) {
        // Prepare an SQL statement to update the user's balance for the selected token coin
        $sql = "UPDATE user_wallets SET {$tokenCoins[$selectedCoin]} = {$tokenCoins[$selectedCoin]} + ? WHERE userid = ? AND wallet_address = ?";
        $stmt = $conn->prepare($sql);

        // Assuming 'userid' is the column name for the user ID and 'wallet_address' is the column name for the wallet address
        $userid = $_SESSION['userid']; // Get the user ID from the session, modify as needed

        // Bind parameters and execute the statement
        $stmt->bind_param("iss", $value, $userid, $walletAddress);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            echo "User balance updated successfully for $selectedCoin!";
            header("location:veiw");
        } else {
            echo "No rows updated. Wallet address or user ID not found.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Invalid token coin selected.";
    }

    // Close the database connection (consider using a function to close connections)
    $conn->close();
}