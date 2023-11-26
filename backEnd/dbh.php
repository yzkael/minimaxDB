<?php
// Database connection settings
$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO your_table_name (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        header("Location: index.html"); // Redirect to the main page after inserting
        exit();
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
