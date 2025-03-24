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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./dashboard.css"> <!-- External CSS -->
</head>
<body>

    <div class="container">
        <?php include "back_end-header_menu.php" ?>
        
        

        <!-- Main Content -->
        <div class="main-content">
           
           <?php include "top-bar.php" ?>


            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <h2>Welcome, You Are Logged In!</h2>
                <p>Here is your admin panel dashboard.</p>
            </div>
        </div>


      






    </div>

</body>
</html>
