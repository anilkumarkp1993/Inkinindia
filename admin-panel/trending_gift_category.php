<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}


$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;

// Fetch trending gift categories
$result = $conn->query("SELECT c.*, t.name AS trending_gift_name 
                        FROM trending_gift_category c
                        JOIN trending_gift_master t ON c.trend_gift_id = t.id");
                        
// Fetch trending gifts for dropdown
$gift_result = $conn->query("SELECT * FROM trending_gift_master");

$gift_result_edit = $conn->query("SELECT * FROM trending_gift_master");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Gift Categories</title>
    <link rel="stylesheet" href="./dashboard.css"> <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- <div class="container"> -->
        <div class="dashboard-container">
        <?php include "back_end-header_menu.php" ?>
        
        

        <!-- Main Content -->
        <div class="main-content">
           
           <?php include "top-bar.php" ?>


            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <h2 class="text-center">Trending Gift Categories</h2>

                <!-- Add Gift Button -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">+ Add  Category</button>

    <!-- Gift Table -->
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Trending Gift</th>
                <th>Name</th>
                <th>Banner Image</th>
                <th>Category Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $serial_no = 1;
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $serial_no++ ?></td>
                    <td><?= $row['trending_gift_name'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><img src="uploads/trending_gift_category/<?= $row['cate_banner_image'] ?>" width="50"></td>
                    <td><img src="uploads/trending_gift_category/<?= $row['category_image'] ?>" width="50"></td>
                    <td>
                        <button class="btn btn-warning btn-edit" data-id="<?= $row['id'] ?>" 
                                data-name="<?= $row['name'] ?>" data-trend_gift_id="<?= $row['trend_gift_id'] ?>"
                                data-cate_banner_image="<?= $row['cate_banner_image'] ?>" 
                                data-category_image="<?= $row['category_image'] ?>" 
                                data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                       <!--  <a href="delete.php?id=<//?= $row['id'] ?>" class="btn btn-danger btn-delete ">Delete</a> -->

                         <button class='btn btn-danger btn-delete' data-id="<?= $row['id']?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>

        </tbody>  
    </table>

      
            </div>



  <!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" enctype="multipart/form-data">
                    <label>Trending Gift</label>
                    <select name="trend_gift_id" class="form-control" required>
                        <option value="">Select</option>
                        <?php while ($gift = $gift_result->fetch_assoc()): ?>
                            <option value="<?= $gift['id'] ?>"><?= $gift['name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <label>Banner Image</label>
                    <input type="file" name="cate_banner_image" class="form-control">
                    <label>Category Image</label>
                    <input type="file" name="category_image" class="form-control">
                    <button type="submit" class="btn btn-success mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" enctype="multipart/form-data">
                     <label>Trending Gift</label>
                    <select name="trend_gift_id" id="edit_trend_gift_id" class="form-control" required>
                <option value="">Select</option>
                <?php while ($gift = $gift_result_edit->fetch_assoc()): ?>
                    <option value="<?= $gift['id'] ?>"><?= $gift['name'] ?></option>
                <?php endwhile; ?>
              </select>

                    <input type="hidden" name="id" id="edit_id">
                    <label>Name</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                    <label>Banner Image</label>
                    <input type="file" name="cate_banner_image" class="form-control">
                      <div class="mt-2">
                    <img id="banner_image_preview" src="" class="img-thumbnail" style="width: 100px; display: none;">
                </div>
                    <label>Category Image</label>
                    <input type="file" name="category_image" class="form-control">
                   <div class="mt-2">
                    <img id="list_image_preview" src="" class="img-thumbnail" style="width: 100px; display: none;">
                </div>
                    <button type="submit" class="btn btn-warning mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>





        </div>

 </div>

<script>
$(document).ready(function () {
    // Add Category AJAX
    $("#addCategoryForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: "add.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                let res = JSON.parse(response);
                alert(res.message);
                if (res.status === "success") {
                    location.reload();
                }
            }
        });
    });

    // Edit Category AJAX
    $("#editCategoryForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: "edit.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                let res = JSON.parse(response);
                alert(res.message);
                if (res.status === "success") {
                    location.reload();
                }
            }
        });
    });

    // Delete Category AJAX
    $(".btn-delete").click(function () {
        let id = $(this).data("id");

        if (confirm("Are you sure you want to delete this category?")) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: { id: id },
                success: function (response) {
                    let res = JSON.parse(response);
                    alert(res.message);
                    if (res.status === "success") {
                        location.reload();
                    }
                }
            });
        }
    });

    // Populate Edit Modal
    $(".btn-edit").click(function () {
        $("#edit_id").val($(this).data("id"));
        $("#edit_name").val($(this).data("name"));
    });
});

$(document).on("click", ".btn-edit", function () { 
    let id = $(this).data("id");
    let name = $(this).data("name");
    let trendGiftId = $(this).data("trend_gift_id"); // Get the selected trending gift ID
    

    // Set values in modal form fields
    $("#edit_id").val(id);
    $("#edit_name").val(name);
    
    // Set the selected value in dropdown
    $("#edit_trend_gift_id").val(trendGiftId);
});

$(document).on("click", ".btn-edit", function () { 
    let id = $(this).data("id"); // Get category ID

    $.ajax({
        url: "get_category_details.php", // PHP file to fetch details
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                $("#edit_id").val(response.data.id);
                $("#edit_name").val(response.data.name);

                // Set banner image preview
                if (response.data.cate_banner_image) {
                    $("#banner_image_preview")
                        .attr("src", "uploads/trending_gift_category/" + response.data.cate_banner_image)
                        .show();
                } else {
                    $("#banner_image_preview").hide();
                }

                // Set category image preview
                if (response.data.category_image) {
                    $("#list_image_preview")
                        .attr("src", "uploads/trending_gift_category/" + response.data.category_image)
                        .show();
                } else {
                    $("#list_image_preview").hide();
                }

                // Show the modal
                $("#editModal").modal("show");
            }
        },
        error: function () {
            alert("Failed to fetch data");
        }
    });
});



</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
