<?php
include '../includes/db.php'; // Include your database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validate date input
    if (!empty($start_date) && !empty($end_date)) {
        // Prepare the SQL query to fetch invoices within the date range
        $sql = "SELECT invoice.invoice_no, invoice.date, customer.title, customer.first_name, customer.middle_name, customer.last_name, 
                       district.district, invoice.item_count, invoice.amount 
                FROM invoice 
                INNER JOIN customer ON invoice.customer = customer.id 
                INNER JOIN district ON customer.district = district.id
                WHERE invoice.date BETWEEN '$start_date' AND '$end_date'
                ORDER BY invoice.date ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='table-responsive'><table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Customer District</th>
                        <th>Item Count</th>
                        <th>Invoice Amount</th>
                    </tr>
                  </thead><tbody>";
            // Fetch and display results
            while ($row = $result->fetch_assoc()) {
                $customer_name = $row['title'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
                echo "<tr>
                        <td>{$row['invoice_no']}</td>
                        <td>{$row['date']}</td>
                        <td>{$customer_name}</td>
                        <td>{$row['district']}</td>
                        <td>{$row['item_count']}</td>
                        <td>{$row['amount']}</td>
                      </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<p>No invoices found for the selected date range.</p>";
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
