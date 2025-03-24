<?php
session_start();
include 'db.php'; // Include DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("User not logged in.");
    }
    
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $is_default = isset($_POST['setAsDefault']) ? 1 : 0;

    // Insert into the addresses table
    $sql = "INSERT INTO addresses (user_id, first_name, last_name, company, address, city, country, province, postal_code, phone, is_default)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssssi", $user_id, $first_name, $last_name, $company, $address, $city, $country, $province, $postal_code, $phone, $is_default);

     if ($stmt->execute()) {
        $_SESSION['flash_message'] = "Address saved successfully!";
    } else {
        $_SESSION['flash_message'] = "Error saving address!";
    }

    // Redirect back to the same page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
