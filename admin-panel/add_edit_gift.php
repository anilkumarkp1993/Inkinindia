<?php

$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $upload_dir = "uploads/trending_gifts";

    // Handle Image Uploads
    $list_image = null;
    $banner_image = null;

    if (!empty($_FILES['list_image']['name'])) {
        $list_image = $upload_dir . time() . "_list_" . basename($_FILES['list_image']['name']);
        move_uploaded_file($_FILES['list_image']['tmp_name'], $list_image);
    }

    if (!empty($_FILES['banner_image']['name'])) {
        $banner_image = $upload_dir . time() . "_banner_" . basename($_FILES['banner_image']['name']);
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $banner_image);
    }

    if ($id) {
        // Update Record
        $query = "UPDATE trending_gift_master SET name = ?, list_image = IFNULL(?, list_image), banner_image = IFNULL(?, banner_image) WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $name, $list_image, $banner_image, $id);
    } else {
        // Insert New Record
        $query = "INSERT INTO trending_gift_master (name, list_image, banner_image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $list_image, $banner_image);
    }

    if ($stmt->execute()) {
        echo "Gift saved successfully!";
    } else {
        echo "Error saving gift!";
    }
}

?>