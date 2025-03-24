<?php
include $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete query
    $sql = "DELETE FROM trending_gift_category WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Category deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
?>
