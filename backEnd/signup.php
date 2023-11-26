<?php
session_start();
include_once 'db_config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate inputs (perform more rigorous validation as needed)
    if (!empty($username) && !empty($password) && !empty($email)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into 'users' table
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sss', $username, $hashed_password, $email);
        
        if ($stmt->execute()) {
            // Redirect to a success page or login page after successful signup
            header('Location: login.php');
            exit;
        } else {
            $error = "Error occurred while signing up. Please try again.";
        }
    } else {
        $error = "Please fill in all the fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Sign Up</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="signup.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
