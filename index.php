<!DOCTYPE html><html><head><title>Banana Threads Inc.</title></head><body>
<?php
include('login.php');
// login to MariaDB
try { // if something goes wrong, an exception is thrown
    
    $dsn = "mysql:host=courses;dbname=z1860574";
    $pdo = new PDO($dsn, $username, $password); 
    
    #homepage
    echo "<h1>Welcome to Banana Threads Inc.</h1><br>";

    echo $goToCart = "<a href='cart.php'>Go to Cart</a><br>";
    echo $goToOrders = "<a href='order.php'>Go to Orders</a><br>";
    ?>

    <form method="post">
        <label for="products">Select product:</label>
        <?php
        $rs = $pdo->query("SELECT p_name, p_price FROM Product;");
        $row = $rs->fetchAll(PDO::FETCH_ASSOC);
        echo '<option value="">Select Product </option>';
        foreach ($row as $item) {
            echo '<option value="' . $item["p_name"] . "|" . $item["p_price"] . '">' . $item["p_name"] . "</option>";
        }
        ?>
        </select>


<?php
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>
</body></html>