<?php
session_start();
include_once 'db_config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session
    $quantity_sold = $_POST['quantity_sold'];
    $sale_amount = $_POST['sale_amount'];

    // Your logic to validate inputs and insert into 'sales' table
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Sale</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register Sale</h2>
    <form action="register_sale.php" method="post">
        <!-- Input fields for registering a sale -->
        <!-- Assuming input fields for product_id, quantity_sold, sale_amount -->
        <input type="text" name="product_id" placeholder="Product ID" required>
        <input type="text" name="quantity_sold" placeholder="Quantity Sold" required>
        <input type="text" name="sale_amount" placeholder="Sale Amount" required>
        <input type="submit" value="Register Sale">
    </form>
</body>
</html>
