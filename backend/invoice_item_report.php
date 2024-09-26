<?php
include '../includes/db.php'; // Include your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validate date input
    if (!empty($start_date) && !empty($end_date)) {
        // Prepare the SQL query to fetch invoice items within the date range
        $sql = "SELECT invoice.invoice_no, invoice.date, CONCAT(customer.title, ' ', customer.first_name, ' ', customer.middle_name, ' ', customer.last_name) AS customer_name, 
                       item.item_name, item.item_code, item_category.category, invoice_master.unit_price 
                FROM invoice_master
                INNER JOIN invoice ON invoice_master.invoice_no = invoice.invoice_no
                INNER JOIN customer ON invoice.customer = customer.id
                INNER JOIN item ON invoice_master.item_id = item.id
                INNER JOIN item_category ON item.item_category = item_category.id
                WHERE invoice.date BETWEEN '$start_date' AND '$end_date'
                ORDER BY invoice.date ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'><table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>Invoice No</th>
                        <th>Invoiced Date</th>
                        <th>Customer Name</th>
                        <th>Item Name & Item Code</th>
                        <th>Item Category</th>
                        <th>Item Unit Price</th>
                    </tr>
                  </thead><tbody>";
            // Fetch and display results
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['invoice_no']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['item_name']} ({$row['item_code']})</td>
                        <td>{$row['category']}</td>
                        <td>{$row['unit_price']}</td>
                      </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<p>No invoice items found for the selected date range.</p>";
        }
    } else {
        echo "<p>Please select a valid date range.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}

// Close database connection
$conn->close();
?>
