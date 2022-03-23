<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');
$products = Product::convertArrayToProducts($products_data);
$customer = new Customer('John Doe', 'john@mail.com');


?>


<html>
<head>
    <title>My Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="shopping-cart.jpeg" alt="" width="35" height="28" class="d-inline-block align-text-top">
      Product List
    </a>
    <a class="navbar-brand 5rem">Welcome to our Products! <?php echo $customer->getName() ?>!</a>
    <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <h4 class="form-control"> <a href="shopping-cart.php">Shopping Cart</a></h4>
    </form>
  </div>
</nav>

<div class="container-fluid px-4">
    <div class="row gx-5 gy-5 row-cols-3">
    <?php foreach ($products as $product): ?>
    <form action="add-to-cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />

            <div class ='text-center'>
                <div>
                    <h3 class=""><?php echo $product->getName(); ?></h3>
                </div>
            <img src="<?php echo $product->getImage(); ?>" height="200x" width='300' />
            <p class='text-center'>
            <?php echo $product->getDescription(); ?><br/>
            <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
        
            <input type="number" name="quantity" class="form-control" value="0" placeholder="Quantity"/>
            <button type="submit" name="add_to_cart" style="margin-top:5px" class="btn btn-info" > Add to Cart</button>
            </p>
            </div>
            
    </form>
    <?php endforeach;?>
    </div>
</div>
</body>
</html>