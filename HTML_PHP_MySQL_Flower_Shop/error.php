<!DOCTYPE html>
<html>
<!--************************************************************* 
     * File name: ./error.php
     * Purpose:   Prj-INFO152-TEAM01, displaying database error
     * Complete Date: 03/25/2023     
     * Author: Gayan Rathnathilake 
     * DrexelId: ger38
     ************************************************************ -->
<!-- the head section -->
<head>
    <title>My Flower Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>

<!-- Navigation -->
<div class="navigation">
  <a class="active" href="index.html">Home</a>
  <a href="display.php">Display Page</a>
  <a href="form.php">Form Page</a>
  <a href="login.html">Login</a>
</div>
<br>

    <header><h1>My Flower Shop</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Flower Shop, Inc.</p>
    </footer>
</body>
</html>