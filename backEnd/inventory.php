<?php
session_start();
include_once 'db_config.php'; // Include database connection

// Fetch inventory data from the 'inventory' table
$query = "SELECT * FROM inventory";
$result = $connection->query($query);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Inventory</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <h2>Inventory</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["product_id"] . "</td>
            <td>" . $row["product_name"] . "</td>
            <td>" . $row["price"] . "</td>
            <td>" . $row["quantity"] . "</td>
        </tr>";
    }

    echo "</table></body></html>";
} else {
    echo "No inventory records found.";
}
?>
