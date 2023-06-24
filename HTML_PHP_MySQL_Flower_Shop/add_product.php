<?php
/* 
     * File name: ./add_product.php
     * Purpose:   Prj-INFO152-TEAM01, adding content to the databse
     * Complete Date: 03/25/2023
     * Author: Gayan Rathnathilake 
     * DrexelId: ger38
     **/
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$flowertype = filter_input(INPUT_POST, 'flowertype');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$discount = filter_input (INPUT_POST, 'discount');
$flowerdescription = filter_input (INPUT_POST, 'flowerdescription');

// Validate inputs
if ($category_id == null || $category_id == false ||
           $flowertype == null || $price == false || $discount == null || $flowerdescription == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('flower_shop_db.php');

    // Add the product to the database  
    $query = 'INSERT INTO Products
                 (categoryID, flowerType, price, discount, flowerDescription)
              VALUES
                 (:category_id, :flowertype, :price, :discount, :flowerdescription)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':flowertype', $flowertype);
    $statement->bindValue(':price', $price);
	$statement->bindValue(':discount', $discount);
	$statement->bindValue(':flowerdescription', $flowerdescription);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('form.php');
}
?>