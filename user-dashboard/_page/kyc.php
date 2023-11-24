<?php
// kyc.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uploadkyc'])) {
    require_once("../../_db.php");

    // Get the user ID
    $userid = $_POST['userid']; // Replace this with the actual user ID

    // File upload handling
    if (isset($_FILES['kyc']) && $_FILES['kyc']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['kyc']['tmp_name'];
        $fileName = $_FILES['kyc']['name'];
        $fileSize = $_FILES['kyc']['size'];
        $fileType = $_FILES['kyc']['type'];
        
        // Specify the directory where you want to store the uploaded file
        $uploadDirectory = "../../uploads/"; // Change this to your desired directory

        // Move the uploaded file to the specified directory
        $targetFilePath = $uploadDirectory . basename($fileName);
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            // Update the user_login table with the file path for the user's KYC
            $updateQuery = "UPDATE user_login SET kyc = ? WHERE userid = ?";
            $stmt = $conn->prepare($updateQuery);

            if ($stmt) {
                $stmt->bind_param("ss", $targetFilePath, $userid);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "KYC image uploaded successfully!";
                    header('location:'.$_SERVER["HTTP_REFERER"]);
                } else {
                    echo "Failed to update KYC image!";
                }

                $stmt->close();
            } else {
                echo "Prepare statement error: " . $conn->error;
            }
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "No file uploaded or an error occurred during upload.";
    }
}
?>
