<!DOCTYPE html><html><head><title>Banana Threads Inc.</title></head><body>
    
<!--login to mariadb-->
<?php
    // hide credentials
    include('login.php');
    // init PDO
    try { 
        $dsn;
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


    // login
        $prepared = $pdo->prepare('SELECT Email, Name
                                FROM Customer
                                WHERE Email = ?');
    $prepared->execute(array($_POST["email"]));
    $res = $prepared->fetchALL(PDO::FETCH_ASSOC);


    if (sizeof($res) == 0) {
        echo "<br>Not Logged in or incorrect email<br><br>";
    }
    else if (sizeof($res) == 1) {
        echo "Welcome " . $res[0]["Name"] ."!<br>";
    }

    // Select from inventory
?>
</body></html>
