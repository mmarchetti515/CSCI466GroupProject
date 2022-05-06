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


<h2>Banana Threads Employee Servicing Portal</h2>
<?php
    echo '<br><br><form action="index.php">';
    echo '<input type="submit" value="Home" />';
    echo '</form>';
    
    echo"<h3>Store Inventory:</h3>";
    $rs = $pdo->query('SELECT * FROM Product;');
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    reg_table($rows);

    echo '<h3>Pending and Complete Orders:</h3>';
    $rs = $pdo->query("SELECT * FROM Order_;");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    reg_table($rows);

    $rs = $pdo->query("SELECT * FROM Customer_Order");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    reg_table($rows);
?>

<form method="post" action="send_script.php">
    Recipient : <input type="text"  name="Recipient" ><br />
    Name:       <input type="text"  name="name     " > <br />
    email:      <input type="email" name="email    " > <br />
    Subject:    <input type="text"  name="subject  " > <br />
    Message:    <textarea name="msg"></textarea>
    <button type="submit" name="send_message_btn">Send</button>
