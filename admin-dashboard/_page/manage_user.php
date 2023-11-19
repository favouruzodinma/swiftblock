<?php
// Assuming $conn is your database connection

// Get the user ID from the URL parameter
$userid = $_GET['userid'] ?? null;

if ($userid && isset($_GET['status'])) {
    // Check the status value from the URL
    $newStatus = ($_GET['status'] === 'verified') ? 'disabled' : 'enabled';

    // Prepare the UPDATE query using a prepared statement
    $stmt = $conn->prepare("UPDATE user_login SET status=? WHERE userid=?");

    if ($stmt) {
        // Bind the parameters and execute the statement
        $stmt->bind_param("ss", $newStatus, $userid); // Assuming userid is a string, change "s" if it's a different data type
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            // Redirect to user.php if the update was successful
            header("Location:view");
            exit;
        } else {
            // Handle if the update did not affect any rows
            echo "No records were updated.";
        }
    } else {
        // Handle if the prepared statement could not be created
        echo "Prepared statement failed: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle if userid or status parameter is missing
    echo "Invalid request or missing parameters.";
}


?>
