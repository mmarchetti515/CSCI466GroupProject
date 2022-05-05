<!DOCTYPE html><html><head><title>Banana Tech Inc.</title></head><body>
    
<!--login to mariadb-->
<?php
    // hide credentials
    include('login.php');
    // init PDO
    try { 
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

    // Get Customer Email and Password 
    echo "<form action=\"\" method=\"POST\">";
        echo "<h3> Please enter E-mail: ";
        echo "<input type=\"text\" name=\"entered_email\"/>";        
        echo "<h3> Please enter Password: ";
        echo "<input type=\"password\" name=\"entered_password\"/>"; 
        echo "<input type=\"submit\"><br><br>";
    echo "</form>";

    
    // login result
    // if no email has been entered: usually when page is first loaded
    //      otherwise php throws an error
    if (sizeof($_POST) == 0) {
        echo "Not logged in<br><br>";
    }
    else { 
        // login
        $prepared = $pdo->prepare('SELECT Email, Name
                                    FROM Customer
                                    WHERE Email = ? AND 
                                    Password =?');
        $prepared->execute(array($_POST["entered_email"], $_POST["entered_password"]));
        $res = $prepared->fetchALL(PDO::FETCH_ASSOC);

        if (sizeof($res) == 0) {
            echo "Incorrect email or password<br><br>";
            // create a boolean value for logged in or not
            $test = False;
        }
        else if (sizeof($res) == 1) {
            echo "Welcome " . $res[0]["Name"] ."!<br><br>";
            // create a boolean value for logged in or not
            $test = True;
        }
        
        // Create Session Variable
        session_start();
        $_SESSION['inter_email'] = $_POST["entered_email"];
        $_SESSION['inter_password'] = $_POST["entered_password"];
        $_SESSION['log_bool'] = $test;
    }

    // Go to cart
    echo "<a href='cart.php'>View your Cart</a><br>";
    // Go to orders
    echo "<a href='order.php'>View your Orders</a><br><br>";

    // Product Select 
    

?>
</body></html>
