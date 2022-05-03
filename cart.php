<!DOCTYPE html><html><head><title>BT Cart</title></head><body>
<?php
include('login.php');
// login to MariaDB
try { // if something goes wrong, an exception is thrown
    $dsn = "mysql:host=courses;dbname=z1860574";
    $pdo = new PDO($dsn, $username, $password); 
    
    #homepage
    echo "<h1>View your cart here!</h1><br>";

    echo $goToHome = "<a href='index.php'>Go to Home</a><br>";
    echo $goToCheckout = "<a href='checkout.php'>Proceed to checkout<br></a><br>";
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body></html>