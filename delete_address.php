<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    // Prepare the DELETE statement
    $sql = "DELETE FROM addresses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success"; // Return success message
    } else {
        echo "error"; // Return error message
    }
     header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

    $stmt->close();
    $conn->close();
}
?>
