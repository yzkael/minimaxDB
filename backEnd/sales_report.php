<?php
session_start();
include_once 'db_config.php'; // Include database connection

// Fetch sales report data from the 'sales' table
$query = "SELECT * FROM sales";
$result = $connection->query($query);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Sales Report</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <h2>Sales Report</h2>
        <table>
            <tr>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Quantity Sold</th>
                <th>Sale Amount</th>
                <th>Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["user_id"] . "</td>
            <td>" . $row["product_id"] . "</td>
            <td>" . $row["quantity_sold"] . "</td>
            <td>" . $row["sale_amount"] . "</td>
            <td>" . $row["date_column"] . "</td>
        </tr>";
    }

    echo "</table></body></html>";
} else {
    echo "No sales records found.";
}
?>
