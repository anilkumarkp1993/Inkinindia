<?php
include $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $query = "SELECT id, name, cate_banner_image, category_image FROM trending_gift_category WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode(["status" => "success", "data" => $row]);
    } else {
        echo json_encode(["status" => "error", "message" => "No record found"]);
    }
}
?>
