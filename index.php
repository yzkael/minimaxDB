<!DOCTYPE html>
<html>
<head>
    <title>Web Database Example</title>
    <link rel="stylesheet" href="frontEnd/style.css">
</head>
<body>
    <h1>Sign Up</h1>
    
    <!-- Form to add data -->
    <form action="backEnd/insert.php" method="post">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="password" name="pwd" placeholder="Enter Password">
        <input type="text" name="email" placeholder="Enter Email">
        <input type="submit" value="Sign Up">
    </form>

    <!-- Displaying data -->
    <div class="data">
        <?php include 'display.php'; ?>
    </div>
</body>
</html>