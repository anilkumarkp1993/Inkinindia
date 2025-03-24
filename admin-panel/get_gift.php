<?php
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;


// Check if 'id' is received via POST
if (isset($_POST['id'])) {
    $gift_id = intval($_POST['id']); // Sanitize input

    // Fetch gift details
    $query = "SELECT * FROM trending_gift_master WHERE id = $gift_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "Gift not found"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();


?>