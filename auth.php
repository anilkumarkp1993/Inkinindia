<?php
session_start();

// $db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/config/db.php";
// require $db_path;

include "db.php";

// Register User
if (isset($_POST['action']) && $_POST['action'] == "register") {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

   $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hashed_password, $role); 

    $role = 2; // Define role as an integer before binding

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }


    $stmt->close();
}

// Login User
if (isset($_POST['action']) && $_POST['action'] == "login") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Email and password are required."]);
        exit;
    }

    $stmt = $conn->prepare("SELECT id, first_name, password, role,email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$first_name, $hashed_password, $role,$db_email);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['role'] = $role;
            $_SESSION['email'] = $db_email;

            //var_dump($_SESSION); exit;

            // Return role instead of redirecting
            echo json_encode(["status" => "success", "role" => $role,"first_name" => $first_name,"email" => $db_email]);
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No user found with this email."]);
    }

    $stmt->close();
}

$conn->close();
?>


