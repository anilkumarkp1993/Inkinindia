<?php
include $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $trend_gift_id= $_POST['trend_gift_id'];

    // Check if new images are uploaded
    $target_dir = "uploads/trending_gift_category/";
    $set_clauses = [];

    if (!empty($_FILES['cate_banner_image']['name'])) {
        $banner_image = $_FILES['cate_banner_image']['name'];
        $banner_path = $target_dir . basename($banner_image);
        move_uploaded_file($_FILES["cate_banner_image"]["tmp_name"], $banner_path);
        $set_clauses[] = "cate_banner_image = '$banner_image'";
    }

    if (!empty($_FILES['category_image']['name'])) {
        $category_image = $_FILES['category_image']['name'];
        $category_path = $target_dir . basename($category_image);
        move_uploaded_file($_FILES["category_image"]["tmp_name"], $category_path);
        $set_clauses[] = "category_image = '$category_image'";
    }

    $set_clauses[]= "trend_gift_id = '$trend_gift_id'";

    $set_clauses[] = "name = '$name'";
    $set_clause_str = implode(", ", $set_clauses);

    // Update Query
    $sql = "UPDATE trending_gift_category SET $set_clause_str WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Category updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
?>
