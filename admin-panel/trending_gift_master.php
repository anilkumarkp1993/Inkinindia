<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Gift Master</title>
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
                <h2 class="text-center">Trending Gifts Master</h2>

                <!-- Add Gift Button -->
    <button class="btn btn-success mb-3" id="addGiftBtn">+ Add Gift</button>

    <!-- Gift Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>List Image</th>
                <th>Banner Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="giftTableBody">
            <!-- Data will be loaded here via AJAX -->
        </tbody>
    </table>

      
            </div>



            <!-- Modal (Add & Edit) -->
<div class="modal fade" id="giftModal" tabindex="-1" aria-labelledby="giftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="giftModalLabel">Add Gift</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="giftForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="gift_id">
                    <div class="mb-3">
                        <label class="form-label">Gift Name</label>
                        <input type="text" class="form-control" name="name" id="gift_name" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">List Image</label>
                    <input type="file" class="form-control" name="list_image" id="list_image">
                    <img id="list_image_preview" src="" class="mt-2 img-thumbnail" style="width: 100px; display: none;">
                </div>

            <div class="mb-3">
                <label class="form-label">Banner Image</label>
                <input type="file" class="form-control" name="banner_image" id="banner_image">
                <img id="banner_image_preview" src="" class="mt-2 img-thumbnail" style="width: 100px; display: none;">
            </div>

                    <button type="submit" class="btn btn-primary">Save Gift</button>
                </form>
            </div>
        </div>
    </div>
</div>





        
        </div>

 </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script>
$(document).ready(function() {
    loadGifts(); // Load data when the page loads

    // Open Modal for Add Gift
    $("#addGiftBtn").click(function() {
        $("#giftForm")[0].reset();
        $("#gift_id").val("");
        $("#giftModalLabel").text("Add Gift");
        $("#giftModal").modal("show");
    });

    // Open Modal for Edit Gift
    $(document).on("click", ".editBtn", function() {
    var giftId = $(this).data("id");

    $.ajax({
        url: "get_gift.php",
        type: "POST",
        data: { id: giftId },
        dataType: "json",
        success: function(response) {
            if (response.error) {
                alert(response.error);
                return;
            }

            // Set form values
            $("#gift_id").val(response.id);
            $("#gift_name").val(response.name);

            // Set image preview
            if (response.list_image) {
                $("#list_image_preview").attr("src", response.list_image).show();
            } else {
                $("#list_image_preview").hide();
            }

            if (response.banner_image) {
                $("#banner_image_preview").attr("src", response.banner_image).show();
            } else {
                $("#banner_image_preview").hide();
            }

            $("#giftModalLabel").text("Edit Gift");
            $("#giftModal").modal("show");
        }
    });
});


    // Submit Form (Add & Edit)
    $("#giftForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "add_edit_gift.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                $("#giftModal").modal("hide");
                loadGifts();
            }
        });
    });

    // Delete Gift
    $(document).on("click", ".deleteBtn", function() {
        var giftId = $(this).data("id");
        if (confirm("Are you sure you want to delete this gift?")) {
            $.ajax({
                url: "delete_gift.php",
                type: "POST",
                data: { id: giftId },
                success: function(response) {
                    alert(response);
                    loadGifts();
                }
            });
        }
    });

    // Load Data
    function loadGifts() {
        $.ajax({
            url: "fetch_gifts.php",
            type: "GET",
            success: function(data) {
                $("#giftTableBody").html(data);
            }
        });
    }
});
</script>

</body>
</html>
