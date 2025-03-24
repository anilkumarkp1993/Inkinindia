<?php
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM trending_gift_master WHERE id = ?");
    $stmt->bind_param("i", $id);

    echo $stmt->execute() ? "Gift deleted successfully!" : "Error deleting gift!";
}
?>
