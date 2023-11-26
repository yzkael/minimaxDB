<?php
session_start();
include_once 'db_config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session
    $quantity_sold = $_POST['quantity_sold'];
    $sale_amount = $_POST['sale_amount'];

    // Validate inputs (perform more rigorous validation as needed)
    if (!empty($product_id) && !empty($user_id) && !empty($quantity_sold) && !empty($sale_amount)) {
        // Insert sale data into 'sales' table
        $query = "INSERT INTO sales (user_id, product_id, quantity_sold, sale_amount) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('iiid', $user_id, $product_id, $quantity_sold, $sale_amount);
        
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            header('Location: sales_success.php');
            exit;
        } else {
            $error = "Error occurred while registering the sale. Please try again.";
        }
    } else {
        $error = "Please fill in all the fields.";
    }
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
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
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
