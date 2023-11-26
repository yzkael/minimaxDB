<?php
// Database connection settings
$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve and display data from the database
    $sql = "SELECT * FROM your_table_name";
    $stmt = $conn->query($sql);

    if ($stmt->rowCount() > 0) {
        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
