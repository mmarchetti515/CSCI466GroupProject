<!DOCTYPE html><html><head><title>Banana Tech Inc.</title></head><body>
    
<!--login to mariadb-->
<?php
    // hide credentials
    include('login.php');
    include('functions.php');
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
    echo "<h3> Please login: </h3>";

    // debug
    //print_r($_POST);

    // Get Customer Email and Password through login prompt
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
    if (!isset($_POST["entered_email"]) && !isset($_POST["entered_password"])) {
        // create a boolean value for logged in or not
        $test = False;
        echo "Not logged in<br><br>";
    }
    else if (isset($_POST["entered_email"]) && isset($_POST["entered_password"])){ 
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

    // Go to cart (Not used right now)
    //echo "<a href='cart.php'>View your Cart</a><br>";
    
    // Go to orders
    echo "<a href='order.php'>View your Orders</a><br><br>";

    echo "<h3>Product list: </h3>"; 
    $rs = $pdo->query("SELECT P_Name, P_Price FROM Product");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    make_table($rows);

    echo "<form method=\"POST\" action=\"\">";
        echo "<br><label for=\"product\">Select Product:</label>";
        echo "<select id=\"product\" name=\"product\">";
            $rs = $pdo->query("SELECT P_Name, P_Price FROM Product;");
            $row = $rs->fetchAll(PDO::FETCH_ASSOC);
            echo '<option value=""></option>';
            foreach ($row as $item) {
                #the options to select from in the drop down
                echo '<option value="' . $item["P_Name"] . " | " . $item["P_Price"] . '">' . $item["P_Name"] . "</option>";
            }
        echo "</select><br>";


        echo "<label for=\"quantity\">Enter Quantity:</label>";
        echo "<input type=\"text\" id=\"quantity\" name=\"quantity\"><br>";


        if ($test != True) {
            echo "<h3>Cannot add to cart. You are not logged in!</h3><br>";
        }
        else {
            echo "<br><input type=\"submit\" value=\"Add to Cart\" />";
            // keep user logged in
            echo "<form action=\"\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"entered_email\" value=".$_SESSION['inter_email'].">";
                echo "<input type=\"hidden\" name=\"entered_password\" value=".$_SESSION['inter_password'].">";
            echo "</form>";
        }
    echo "</form>";
    
    // parses product string that contains the P_name and P_Price
    if (isset($_POST["product"]) && $test == True) {
        $exp = explode("|", $_POST["product"]);
    }
    
    // Display Cart on same webpage
    echo "<h3>Your shopping cart</h3><br>";
    


    // add to cart has been selected
    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //      echo "Item added successfully!";
    //}
    ?>
</body></html>
