<!DOCTYPE html><html><head><title>BT Orders</title></head><body>
<?php
include('login.php');
include('functions.php');
// login to MariaDB
try { // if something goes wrong, an exception is thrown
    $dsn = "mysql:host=courses;dbname=z1860574";
    $pdo = new PDO($dsn, $username, $password); 
    
    #homepage
    echo "<h1>View your order here!</h1><br>";
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}



    echo '<form method="post">';
    echo 'Order Number:<input type="text" name="OrderNum"><br>';

    echo '<br><input type="submit" value="Enter" /><br>';
    echo "</form>";

    # display the tracking info.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $res = $pdo->query("SELECT * FROM Order_ where Order_Num = " . $_POST['OrderNum'] . ';');
        $rows = $res->fetch(PDO::FETCH_ASSOC);
        echo "<br>Current Status: ";
        echo $rows['Order_Num'];
        echo "<br>Current Status: ";
        echo $rows['Order_Date'];
        echo "<br>Current Status: ";
        echo $rows['Status'];
        echo "<br>Order Total: ";
        echo $rows['Net_Total'];
    }
    echo '<br><br><form action="index.php">';
    echo '<input type="submit" value="Home" />';
    echo '</form>';
?>
</body></html>