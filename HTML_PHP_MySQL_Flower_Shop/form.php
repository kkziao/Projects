<?php
/************************************************************* 
     * File name: ./form.php
     * Purpose:   Prj-INFO152-TEAM01, display database content
     * Complete Date: 03/25/2023     
     * Author: gayan Rathnathilake 
     * DrexelId: ger38
     ************************************************************/

 //  Connect database, include once	
$dsn = 'mysql:host=localhost;dbname=flower_shop_db';
$username = $_POST['username'];
$password = $_POST['password'];

require_once('flower_shop_db.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// -----------------------------------------------------------------------
// Get name for selected category
$queryCategory = 'SELECT * FROM Categories
                  WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();

// -----------------------------------------------------------------------
// Get all categories
$query = 'SELECT * FROM Categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// -----------------------------------------------------------------------
// Get products for selected category
$queryProducts = 'SELECT * FROM Products
                  WHERE categoryID = :category_id
                  ORDER BY productID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
// -----------------------------------------------------------------------

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Flower Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>

<!-- Navigation -->
<div class="navigation">
  <a href="index.html">Home</a>
  <a href="display.php">Display Page</a>
  <a class="active" href="login.html">Form Page</a>
</div>
<br>

<main>
    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories --> 
        <h2>What categories do we have?</h2>
        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href="form.php?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <h2><?php echo 'Category: '.$category_name; ?></h2>
        <!-- Create first row as table header -->
        <table>
            <tr>
                <th>Flower Type</th>
                <th class="right">Price</th>
				<th class="right">Discount%</th>
				<th> Flower Description</th>
                <th>&nbsp;</th>
            </tr>
         <!-- Use PHP foreach loop to display subsequent rows in HTML table row and table data elements --> 
            <?php foreach ($products as $product) : ?>
            <tr>
              <td><?php echo $product['flowerType']; ?></td>
              <td class="right"><?php echo $product['price']; ?></td>
              <td class="right"><?php echo $product['discount']; ?></td>  
			  <td class="left"><?php echo $product['flowerDescription']; ?></td> 
         <td><form action="delete_product.php" method="post">

       <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <main>
        <section class="wgap"></section>
        <!-- Inserting text boxes to input data --> 
        <h2>Insert new record: </h2>
        <form action="add_product.php" method="post" id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Flower Type:</label>
            <input type="text" name="flowertype"><br>

            <label>Price:</label>
            <input type="text" name="price"><br>
			
			<label>Discount:</label>
            <input type="text" name="discount"><br>
			
			<label>Flower Description:</label>
            <input type="text" name="flowerdescription"><br>
            <!-- Displaying a submit button to submit data -->	
            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
    </main>
  
    </section>
</main>
<!-- Display a copyright sentence -->
<footer>
    <p>&copy; This website is created by Team01 (Gayan, Anna, Anthony, Ziao, Chris, Vignesh) for INFO152-Proj</p>
</footer>
</body>
</html>