<?php


    // Define and assign values to the arguments needed for PDO class 	
    $dsn = 'mysql:host=localhost;dbname=flower_shop_db';
    $username = 'mgs_user';
    $password = 'pa55word';

    // Handle exceptions using try statement
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('flowershop_db_error.php');
        exit();
	}
?>