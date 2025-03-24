<?php
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/db.php";
include $db_path;

// Fetch all gifts from the database
$query = "SELECT * FROM trending_gift_master ORDER BY id ASC"; // Sort in ascending order
$result = $conn->query($query);

$serial_no = 1; // Initialize serial number

$output = ""; // Variable to store table rows

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>";
        $output .= "<td>" . $serial_no++ . "</td>"; // Serial number (starts from 1)
        $output .= "<td>" . $row['name'] . "</td>";
        $output .= "<td><img src='" . $row['list_image'] . "' width='50'></td>";
        $output .= "<td><img src='" . $row['banner_image'] . "' width='50'></td>";
        $output .= "<td>
                        <button class='editBtn btn btn-primary' data-id='" . $row['id'] . "'>Edit</button>
                        <button class='btn btn-danger deleteBtn' data-id='" . $row['id'] . "'>Delete</button>
                    </td>";
        $output .= "</tr>";
    }
} else {
    $output = "<tr><td colspan='5'>No gifts found</td></tr>";
}

echo $output; // Return the table rows to AJAX request
$conn->close();
?>

