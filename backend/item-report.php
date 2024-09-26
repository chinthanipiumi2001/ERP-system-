<?php
// Include the database connection file
include '../includes/db.php'; // Adjust the path as necessary

// SQL query to fetch item details along with category and subcategory names with aggregation
$sql = "SELECT item.item_name, 
               item_category.category, 
               item_subcategory.sub_category, 
               SUM(item.quantity) AS total_quantity
        FROM item
        INNER JOIN item_category ON item.item_category = item_category.id
        INNER JOIN item_subcategory ON item.item_subcategory = item_subcategory.id
        GROUP BY item.item_name, item_category.category, item_subcategory.sub_category";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f8fc;
        }
        .container {
            margin-top: 50px;
            max-width: 1200px;
        }
        .table-container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: 600;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Item Report</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Sub-Category</th>
                        <th>Item Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        // Fetch and display each row from the database
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['item_name'] ?? '') . "</td>
                                    <td>" . htmlspecialchars($row['category'] ?? '') . "</td>
                                    <td>" . htmlspecialchars($row['sub_category'] ?? '') . "</td>
                                    <td>" . htmlspecialchars($row['total_quantity'] ?? '') . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No items found in the database.</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
