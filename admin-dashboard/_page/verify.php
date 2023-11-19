<?php
// Assuming $conn is your database connection

// Get the user ID from the URL parameter
$userid = $_GET['userid'] ?? null;

if ($userid && isset($_GET['status']) && $_GET['status'] === 'pending') {
    // Prepare the UPDATE query using a prepared statement
    $stmt = $conn->prepare("UPDATE user_login SET status='verified' WHERE userid=?");

    if ($stmt) {
        // Bind the parameters and execute the statement
        $stmt->bind_param("s", $userid); // Assuming userid is an integer, change "i" if it's a different data type
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            // Redirect to user.php if the update was successful
            header("Location:user");
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
    // Handle if branch_id or status parameter is missing or status is not 'pending'
    echo "Invalid request or status is not pending.";
}
?>


<?php if($row['status']=='pending'){?>
									<a href= "verify?verify&id=<?php echo
									$row['userid']; ?>&status=pending" class="btn btn-info btn-sm my-2">Verify</a>
									<?php }else{ ?>
									<a href="#" class="btn btn-success btn-sm">Verified</a>
									<?php } ?>
