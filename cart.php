<!DOCTYPE html><html><head><title>BT Cart</title></head><body>
<?php
include('login.php');
// login to MariaDB
try { // if something goes wrong, an exception is thrown
    $pdo = new PDO($dsn, $username, $password); 
    
    //echo $goToHome = "<a href='index.php'>Go to Home</a><br>";
    //echo $goToCheckout = "<a href='checkout.php'>Proceed to checkout<br></a><br>";
}
catch(PDOexception $e) { // handle that exception
    echo "Connection to database failed: " . $e->getMessage();
}
?>

<?php
    // create session for interpage communication
    session_start();
    $passed_email = $_SESSION['inter_email'];   
    $passed_pass = $_SESSION['inter_password'];
    $passed_verify = $_SESSION['log_bool'];

    // test if logged in
    if ($passed_verify == False) {
        echo "<h4>You are not logged in!</h4><br>";
        echo "<form action=\"index.php\" method=\"POST\">";
            echo "<input type=\"submit\" value=\"Go back to homepage\">";
        echo "</form>";
    }
    // logged in
    else {
    // debugging
    //echo "Testing variable passing! <br>";
    //echo "Email Passed-> " . $passed . "<br>";
    
    // redirection
    // send back the email data so the user stays logged in
    echo "<form action=\"index.php\" method=\"POST\">";
        echo "<input type=\"hidden\" name=\"entered_email\" value=$passed_email>";
        echo" <input type=\"hidden\" name=\"entered_password\" value=$passed_pass>";
        echo "<input type=\"submit\" name=\"submit\" value=\"Go back to homepage\">";
    echo "</form>";
    
    //echo "<a href=\"index.php\">Go back to homepage</a><br>";
    //echo "<h1>View your cart here!</h1><br>";
    }
?> 

</body></html>
