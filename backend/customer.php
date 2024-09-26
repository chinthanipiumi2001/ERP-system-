<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $districtName = $_POST['district'];

    // Retrieve the district ID based on the district name
    $districtQuery = "SELECT id FROM district WHERE district = '$districtName'";
    $result = $conn->query($districtQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $districtId = $row['id'];

        // Insert customer data into the customers table with the district ID
        $sql = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district) 
                VALUES ('$title', '$fname', '$mname', '$lname', '$contact', '$districtId')";

        if ($conn->query($sql) === TRUE) {
            header('Location:../templates/success.html');
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid district name provided.";
    }
}
?>
