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

<?php

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$empUser = test_input($_POST["empUser"]);
	$password = test_input($_POST["password"]);
	$prepared = $pdo->prepare("SELECT * FROM empLogin");
	$prepared->execute();
	$users = $prepared->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['empUser'] == $empUser) &&
			($user['password'] == $password)) {
				header("Location: empPortal.php");
		}
		else {
			echo "<script language='javascript'>";
			echo "alert('INVALID LOGIN')";
			echo "</script>";
			die();
		}
	}
}

?>
