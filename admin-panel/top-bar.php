<?php
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;

$user_id = $_SESSION['user_id'];
$query2 = "SELECT image  FROM addresses WHERE user_id = ?";
$stmt2 = $conn->prepare($query2);
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$address = $result2->fetch_assoc();
?>

 <!-- Top Bar -->
            <div class="top-bar">
            	<img src="<?php echo isset($address['image']) ? $address['image'] : 'uploads/default.png'; ?>" 
         class="rounded-circle profile-pic" alt="Profile Picture">
                <a href="profile.php" class="profile-link">My Profile</a>
                <a href="../logout.php"  class="logout-btn">Logout</a>
            </div>

            <style>
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