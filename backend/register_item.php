<?php
// Include the database connection file
include '../includes/db.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    // Form validation - Ensure all fields are filled
    if (!empty($item_code) && !empty($item_name) && !empty($item_category) && !empty($item_subcategory) && !empty($quantity) && !empty($unit_price)) {
        // Prepare the SQL query to insert item details
        $sql = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price) 
                VALUES ('$item_code', '$item_name', '$item_category', '$item_subcategory', '$quantity', '$unit_price')";

        // Execute the query and check for errors
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Item registered successfully');
                    window.location.href = '../templates/success-items.html'; // Redirect to the main page
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('Please fill in all the required fields.');</script>";
    }
}

// Close the database connection
$conn->close();
?>
