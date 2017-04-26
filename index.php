<?php
    define('ROOT_PATH', dirname(__DIR__) . '/');
    include ('header.php');
    //    include('config.php');
    include_once('data/Product.php');
    include_once('data/Category.php');
    include_once('data/CategoryHierarchy.php');

//    $product = Product::get_product(1);

//    echo var_dump(Category::get_categories());
//    echo var_dump(Category::get_categories()[1]);
    $hierarchies = CategoryHierarchy::get_category_hierarchies();
    echo ('<p>' . sizeof(Category::get_categories()) . '</p>');
    echo ('<p>' . sizeof($hierarchies) . '</p>');
    foreach($hierarchies as $hierarchy)
    {
        echo ('<p>' . $hierarchy->category->category_name . '</p>');
    }

    include ('footer.php');
?>