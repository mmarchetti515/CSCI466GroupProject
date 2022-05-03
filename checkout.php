<!DOCTYPE html><html><head><title>BT Checkout</title></head><body>
<?php
include('login.php');
// login to MariaDB
try { // if something goes wrong, an exception is thrown
    $dsn = "mysql:host=courses;dbname=z1860574";
    $pdo = new PDO($dsn, $username, $password); 
    
    #homepage
    echo "<h1>Checkout!</h1><br>";
    echo "<h4>Review your order information and proceed.</h4><br>";

    echo $goToHome = "<a href='index.php'>Go to Home</a><br>";
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body></html>