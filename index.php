<?php
    include ('header.php');
//    include('config.php');
    include_once('data/Product.php');
    $product = Product::get_product(1);

    echo $product->render_product_info();

    include ('footer.php');
?>