<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $company = $_POST["company"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postal_code = $_POST["postal_code"];
    $set_as_default = isset($_POST["setAsDefault"]) ? 1 : 0;


    

    $sql = "UPDATE addresses SET first_name=?, last_name=?, company=?, country=?, address=?, city=?, province=?, postal_code=?, is_default=? WHERE id=?";
    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param("ssssssssii", $first_name,$last_name, $company, $country, $address, $city, $state, $postal_code,$set_as_default,$id);
    

     if ($stmt->execute()) {
        $_SESSION['update_flash_message'] = "Address Updated successfully!";
    } else {
        $_SESSION['update_flash_message'] = "Error Updating address!";
    }

    // Redirect back to the same page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
