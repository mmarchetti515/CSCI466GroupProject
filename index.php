<!DOCTYPE html><html><head><title>Banana Threads Inc.</title></head><body>
    
<!--login to mariadb-->
<?php
    // hide credentials
    include('login.php');
    try { 
        $dsn = "mysql:host=courses;dbname=z1940868";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // catch exception
    catch (PDOexception $e) {
        echo "Connection to database: " . $e->getMessage();
    }
?>

<!-- front end display -->
<?php
    echo "<h1> Welcome to Banana Threads Inc. </h1><br>";

    // Get Customer Email
    echo "<form action=\"\" method=\"POST\">";
        echo "<h3> Please enter E-mail: ";
        echo "<input type=\"text\" name=\"email\"/><br>";        
    echo "</form>";
    
    if (!empty($_POST["email"])) {
        echo "Logged in using " . $_POST["email"] . "<br><br>";
    }
    else {
        echo "Not logged in<br><br>";
    }
    


        

    echo "<a href='cart.php'>Go to Cart</a><br>";
    echo "<a href='order.php'> Go to Orders</a><br>";

    // Select from inventory
    // 
?>
</body></html>
