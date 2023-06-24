<?php
/************************************************************* 
     * File name: ./delete_product.phpphp
     * Purpose:   Prj-INFO152-TEAM01, deleting content from the database
     * Complete Date: 03/25/2023     
     * Author: Gayan Rathnathilake 
     * DrexelId: ger38
     ************************************************************/

//  Connect database, include once	
require_once('flower_shop_db.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($product_id != false && $category_id != false) {
    $query = 'DELETE FROM Products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('form.php');