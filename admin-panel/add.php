<?php
include $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $trend_gift_id = $_POST['trend_gift_id'];
    $name = $_POST['name'];

    // File Uploads
    $banner_image = $_FILES['cate_banner_image']['name'];
    $category_image = $_FILES['category_image']['name'];

    $target_dir = "uploads/trending_gift_category/";
    $banner_path = $target_dir . basename($banner_image);
    $category_path = $target_dir . basename($category_image);

    move_uploaded_file($_FILES["cate_banner_image"]["tmp_name"], $banner_path);
    move_uploaded_file($_FILES["category_image"]["tmp_name"], $category_path);

    // Insert into DB
    $sql = "INSERT INTO trending_gift_category (trend_gift_id, name, cate_banner_image, category_image)
            VALUES ('$trend_gift_id', '$name', '$banner_image', '$category_image')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Category added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
?>
