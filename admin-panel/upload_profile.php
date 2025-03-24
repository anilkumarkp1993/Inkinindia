<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profileImage'])) {
    $user_id = $_POST['user_id'];
    $upload_dir = "uploads/";
    $ext = pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
    $filename = "profile_" . $user_id . "_" . time() . "." . $ext;
    $target_file = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file)) {
        // Check if user already has an entry
        $checkQuery = "SELECT id FROM addresses WHERE user_id = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Update existing record
            $query = "UPDATE addresses SET image = ? WHERE user_id = ?";
        } else {
            // Insert new record
            $query = "INSERT INTO addresses (user_id, image) VALUES (?, ?)";
        }

        $stmt = $conn->prepare($query);
        if ($stmt->num_rows > 0) {
            $stmt->bind_param("si", $target_file, $user_id);
        } else {
            $stmt->bind_param("is", $user_id, $target_file);
        }

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "image_url" => $target_file]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error!"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Upload failed!"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request!"]);
}
?>
