<?php
/************************************************************* 
 * File name: ./display.php
 * Purpose:   Prj-INFO152-TEAM01, addding a form to retrieve input into database from the forms page
 * Complete Date: 03/25/2023     
 * Author: Ziao You
 * DrexelId: zy364
 ************************************************************/

include_once('flower_shop_db.php');

$query_text = 'SELECT a.flowerType, a.price, a.discount,a.flowerDescription, b.categoryName FROM Products a INNER JOIN Categories b ON a.categoryID = b.categoryID';
// Prepare the SQL statement in the input textbox
$statement = $db->prepare($query_text);

// Execute SQL statemnt  
try {
    $statement->execute();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> Error Message:  </p>";
    echo $error_message;
}
// Retrieve the SQL results to store in a PHP variable for later use
try {
    $table_result = $statement->fetchAll();
} catch (Exception $e) {
    $table_result = NULL;
}
// Close the database connection
$statement->closeCursor();

$author = "Ziao You";
$hw = "INFO152-Team_Project";
$current_date = date('Y/m/d'); 
?>

<!DOCTYPE html>

<html lang="en-US">

<!-- the head section -->

<head>
    <title>SQL Statement Practice Tool</title>
    <link rel="stylesheet" href="./display.css">
</head>

<!-- the body section -->

<body>
    <div class="navigation">
        <a href="index.html">Home</a>
        <a class="active" href="display.php">Display Page</a>
        <a href="login.html">Form Page</a>
    </div>
    <main>

        <!-- Develop and execute SQL statement -->
        <h1>Flowers Information </h1>
        <!-- Display the Executed Results -->
        <section>
            <h2>
                We Provide the Cheapest Flowers In the City!
            </h2>
        </section>
        <hr /> 

        <!-- Display Each Flower -->
        <!-- <?php var_dump($table_result);?> -->

        <?php foreach ($table_result as $row_result) { ?>
            <div class="flower">
                <?php echo "<div class='flowerType'>" . $row_result['flowerType'].   "</div>" ;?>
                <?php echo "<div class='categoryName'>". 'Category: ' .$row_result['categoryName']. "</div>" ;?>
                <?php echo "<div class='flowerDescription'>". $row_result['flowerDescription'].     "</div>" ;?>
                <?php echo "<div class='price'>".  'Price: $'.$row_result['price'] .     "</div>" ;?>
                <?php echo "<div class='discount'>". 'Discount: ' .$row_result['discount']. '%'.    "</div>" ;?>
                <?php echo "<div class='totalPrice'>". 'Final Price: $' . $row_result['discount']*$row_result['price']*0.01.    "</div>" ;?>
            </div>
        <?php } ?>


        <section class="wgap"></section>
    </main>
    <!-- Footer -->
    <footer>
        <p>&copy; This website is created by Team01 (Gayan, Anna, Anthony, Ziao, Chris, Vignesh) for INFO152-Proj</p>
    </footer>
</body>

</html>