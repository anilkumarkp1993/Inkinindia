<?php
session_start();

// Include database connection
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;



if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch User Details
$query = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$query2 = "SELECT image  FROM addresses WHERE user_id = ?";
$stmt2 = $conn->prepare($query2);
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$address = $result2->fetch_assoc();


//print_r($address); exit;



// Handle Profile Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);

    if (!empty($first_name) && !empty($last_name) && !empty($email)) {
        $update_query = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sssi", $first_name, $last_name, $email, $user_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Profile updated successfully!";
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating profile!";
        }
    } else {
        $_SESSION['error'] = "All fields are required!";
    }
}

// Handle Password Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    if (!empty($_POST['new_password'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $update_password_query = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($update_password_query);
        $stmt->bind_param("si", $new_password, $user_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Password updated successfully!";
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating password!";
        }
    } else {
        $_SESSION['error'] = "Password cannot be empty!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="./dashboard.css"> <!-- External CSS -->
</head>
<style>
.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
.btn-block {
    display: block;
    width: 100%;
}
    .top-bar {
    display: flex;
    align-items: center;
    gap: 10px; /* Adjust space between elements */
}

.profile-pic {
    width: 30px;  /* Adjust size */
    height: 30px;
    object-fit: cover; /* Ensures proper image fitting */
    border-radius: 50%; /* Makes it round */
    border: 2px solid #ddd; /* Optional border */
}

</style>

<body>

    <div class="container">
        
        <?php include "back_end-header_menu.php" ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <img src="<?php echo isset($address['image']) ? $address['image'] : 'uploads/default.png'; ?>" 
         class="rounded-circle profile-pic" alt="Profile Picture">
                <a href="profile.php" class="profile-link">My Profile</a>
                <a href="../logout.php"  class="logout-btn">Logout</a>
            </div>

            <!-- Dashboard Content -->
            <div class="dashboard-content">


               <!--  <div class="container mt-4"> -->
            <h3 class="text-center">My Profile</h3>
           <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" id="flash-message">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" id="flash-message">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>


        <form id="profileForm" class="card p-4 shadow-sm" enctype="multipart/form-data">
    <div class="text-center">
        <!-- Profile Picture -->
        <img id="profilePic" src="<?php echo isset($address['image']) ? $address['image'] : 'uploads/default.png'; ?>" 
     class="rounded-circle img-fluid d-block mx-auto"  width="100" height="100" alt="Profile Picture">

        <br><br>
        <input type="file" id="profileImage" name="profileImage" accept="image/*" class="form-control">
        <br>
        <button type="button" id="uploadBtn" class="btn btn-primary btn-block">Update Image</button>

    </div>
  </form><br>

    <!-- Success/Error Messages -->
    <div id="message"></div>


            
            <form method="post" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                </div><br>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                </div><br>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <button type="submit" name="update_profile" class="btn btn-primary w-100">Update Profile</button>
            </form>
            
            <hr><br>
            <h3 class="text-center">Change Password</h3>
            <form method="post" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <button type="submit" name="update_password" class="btn btn-danger w-100">Update Password</button>
            </form>
       <!--  </div> -->



               
            </div>

        </div>

    </div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#uploadBtn").click(function() {
        var formData = new FormData();
        var file = $("#profileImage")[0].files[0];

        if (!file) {
            $("#message").html('<div class="alert alert-danger">Please select an image!</div>');
            return;
        }

        formData.append("profileImage", file);
        formData.append("user_id", <?php echo $_SESSION['user_id']; ?>);

        $.ajax({
            url: "upload_profile.php", // Backend script to handle upload
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $("#message").html('<div class="alert alert-success">Profile updated successfully!</div>');
                    $("#profilePic").attr("src", response.image_url); // Update the profile picture
                } else {
                    $("#message").html('<div class="alert alert-danger">' + response.error + '</div>');
                }
                setTimeout(() => $("#message").fadeOut(), 3000); // Auto-hide message
            }
        });
    });
});
</script>

<script>

    setTimeout(function() {
        var flashMessage = document.getElementById("flash-message");
        if (flashMessage) {
            flashMessage.style.transition = "opacity 0.5s";
            flashMessage.style.opacity = "0";
            setTimeout(function() {
                flashMessage.style.display = "none";
            }, 500);
        }
    }, 3000); // Flash message disappears after 3 seconds
</script>

    
