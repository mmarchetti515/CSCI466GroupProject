<!DOCTYPE html><html><head><title>Banana Tech Inc.</title></head><body>  

<!--login to mariadb-->
<?php
    // hide credentials
    include('login.php');
    include('f2.php');
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

<form style=right:2px; action="emplogin.php">
    <input type="submit" value="Employee Login" />
</form>

<!-- front end display -->
    <?php
    echo"<h1> Welcome to Banana Threads Inc. </h1><br>";
    echo"<h3> Please login: </h3>";

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
        
        // logged in
        // prevent this from running just because user is logged in
        else if ($test == True && !empty($_POST["product"])){
                // create a random order number and check if we're still using it
                if (!isset($_POST["rand_order"])) {
                    // if there is no variable with this name
                    // a order_num hasn't been generated so create a new one
                    $rand_order = rand(0, 10000000);
                }
                // form has been sent previously to update cart
                // should lie in $_POST, assign to local variable for usage
                else {
                    $rand_order = $_POST["rand_order"];
                }

                // parse product info and get the ID of the product 
                if (isset($_POST["product"])) {
                    $exp = explode("|", $_POST["product"]);
                } 
                $parse = "SELECT P_ID from Product WHERE P_Name= \"$exp[0]\"";
                $res_parse = $pdo->query($parse);
                $res_rows = $res_parse->fetchAll(PDO::FETCH_ASSOC);

                //echo $res_rows[0]["P_ID"];
                
                // create session variable
                $_SESSION['rand_order'] = $rand_order;

                // check if the $rand_order has a value
                // fill Order_ with order number one time
                if (!empty($rand_order) && empty($_POST["bool_onevisit"])) {
                    // add Order_Num to be used for this current session
                    $add_to_order = $pdo->prepare('INSERT INTO Order_(Order_Num) VALUES(?)');
                    $add_to_order->execute(array($rand_order));
                    // add Customer Email and link to order generated
                    $add = $pdo->prepare('INSERT INTO Customer_Order VALUES(?,?)');
                    $add->execute(array($_SESSION['inter_email'], $rand_order));        
                    // Init Order_Product
                    $addOR = $pdo->prepare('INSERT INTO Order_Product VALUES(?,?,?)');
                    $addOR->execute(array($rand_order,$res_rows[0]["P_ID"], $_POST['quantity']));
                }
                // form has been set once and the proper Order_Num has been populated
                else if (!empty($rand_order) && !empty($_POST["bool_onevisit"])) {
                    $addOR = $pdo->prepare('INSERT INTO Order_Product VALUES(?,?,?)');
                    $addOR->execute(array($rand_order,$res_rows[0]["P_ID"], $_POST['quantity']));
                }

                // keep user logged in
                echo "<input type=\"hidden\" name=\"entered_email\" value=".$_SESSION['inter_email'].">";
                echo "<input type=\"hidden\" name=\"entered_password\" value=".$_SESSION['inter_password'].">";
                
                if (!empty($rand_order)) {
                    echo "<input type=\"hidden\" name=\"rand_order\" value=".$rand_order.">";
                    // test variable: indicates this form has been sent once before
                    // the first form sent fills the Order_ and should not be done on
                    // subsequent form sends
                    echo "<input type=\"hidden\" name=\"bool_onevisit\" value=\"true\">";
                }
        }
        // logged in but no product and quantity have been requested 
        else if ($test == True && !isset($_POST["product"])) {
            // keeyp user logged in but just send the product and qty that was inputted
            // earlier 
            echo "<input type=\"hidden\" name=\"entered_email\" value=".$_SESSION['inter_email'].">";
            echo "<input type=\"hidden\" name=\"entered_password\" value=".$_SESSION['inter_password'].">";           
        } 
            
        // update and add to cart    
        echo "<br><input type=\"submit\" value=\"Add to Cart\" />"; 
    echo "</form>";

    // Display Cart on same webpage
    echo "<h3>Your shopping cart</h3><br>";
    $cart = $pdo->query("SELECT P_ID, Requested_QTY FROM Order_Product where Order_Num=\"$rand_order\"");
    $cart_rows = $cart->fetchAll(PDO::FETCH_ASSOC);
    print_r($cart_rows);
    ?>
</body></html>
