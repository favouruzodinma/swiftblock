<?php
session_start();
// require_once("../../_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'] ?? ''; // Assuming 'userid' is submitted via POST
    $uploadDir = 'kyc/'; // Directory to store uploaded files
    $uploadFile = $uploadDir . basename($_FILES['kyc']['name']); // File path to save in the server
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION)); // Get the file extension

    // Valid image file types
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Check if the uploaded file is an image````
    $check = getimagesize($_FILES['kyc']['tmp_name']);
    if ($check === false) {
        $_SESSION['message'] = 'File is not an image.';
    } elseif (file_exists($uploadFile)) {
        $_SESSION['message'] = 'File already exists.';
    } elseif ($_FILES['kyc']['size'] > 50000000) { // Max file size (50MB)
        $_SESSION['message'] = 'File is too large.';
    } elseif (!in_array($imageFileType, $allowedExtensions)) {
        $_SESSION['message'] = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
    } else {
        if (move_uploaded_file($_FILES['kyc']['tmp_name'], $uploadFile)) {
            // Image uploaded successfully; perform database update here
            require_once('../../_db.php'); // Include database connection

            $sql = 'UPDATE user_login SET kyc = ? WHERE userid = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $uploadFile, $userid);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION['message'] = 'KYC uploaded successfully.';
                header("Location: profile.php?id=$userid");
                exit();
            } else {
                $_SESSION['message'] = 'Failed to update KYC in the database.';
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = 'Error uploading file.';
        }
    }
} else {
    $_SESSION['message'] = 'Invalid request method.';
}

// Redirect to previous page
header('Location: profile.php');
exit();
?>
