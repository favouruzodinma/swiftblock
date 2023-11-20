<?php
session_start();

// Database connection setup (assuming you have a _db.php file with database connection logic)
require_once('../../_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'] ?? ''; // Assuming you get the user ID from the form

    // Directory to store uploaded files
    $uploadDirectory = 'kycuploads/'; // Change this directory as per your requirement
    $uploadFile = $uploadDirectory . basename($_FILES['kyc']['name']);

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES['kyc']['tmp_name']);

    if ($check !== false) {
        // Check file size (you can adjust the file size limit)
        if ($_FILES['kyc']['size'] <= 5000000) { // Adjust the file size limit as needed
            // Allow certain file formats (here allowing only image formats)
            if ($imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === 'jpeg' || $imageFileType === 'gif') {
                // Upload the file to the server
                if (move_uploaded_file($_FILES['kyc']['tmp_name'], $uploadFile)) {
                    // Update database with the file path
                    $stmt = $conn->prepare("UPDATE user_login SET kyc = ? WHERE userid = ?");
                    $stmt->bind_param("ss", $uploadFile, $userid);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        $_SESSION['message'] = 'KYC uploaded and database updated successfully.';
                        header("Location: profile.php?id=$userid");
                        exit();
                    } else {
                        $_SESSION['message'] = 'Failed to update KYC in the database.';
                    }
                    $stmt->close();
                } else {
                    $_SESSION['message'] = 'Failed to upload the file.';
                }
            } else {
                $_SESSION['message'] = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
            }
        } else {
            $_SESSION['message'] = 'File size exceeds the limit.';
        }
    } else {
        $_SESSION['message'] = 'File is not an image.';
    }

    // Redirect to profile page or any other page after processing
    header("Location: profile.php?id=$userid");
    exit();
}
?>
