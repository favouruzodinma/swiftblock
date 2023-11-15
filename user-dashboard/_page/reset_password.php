<?php 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user inputs from the form
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        // Passwords do not match, handle accordingly (show error message)
        $error = "New password and confirm password do not match.";
        header('location:profile');
    } else {
        // Sanitize user inputs
        $oldPassword = htmlspecialchars($oldPassword);
        $newPassword = htmlspecialchars($newPassword);

        // Replace this with your own database connection logic
        require_once('../../_db.php');

        // Retrieve the user's current password from the database
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM user_login WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verify the old password
            if (password_verify($oldPassword, $user['password'])) {
                // Hash the new password before storing it in the database
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $updateSql = "UPDATE user_login SET password = ? WHERE userid = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("ss", $hashedPassword, $userid);
                if ($updateStmt->execute()) {
                    // Password updated successfully
                    $success = "Password updated successfully!";
                    header('location:profile');
                } else {
                    // Handle database update error
                    $error = "Password update failed. Please try again.";
                    header('location:profile');
                }
            } else {
                // Old password does not match
                $error = "Old password is incorrect.";
                header('location:profile');
            }
        } else {
            // User not found in the database
            $error = "User not found.";
            header('location:profile');
        }

        // Close the database connection
        $conn->close();
    }
}
