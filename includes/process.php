<?php 
    include_once 'config/db_init.php';
    include_once 'objects/product.php';
    include_once 'objects/category.php';
    
    $product = new Product($db);
    $category = new Category($db);

    if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category_id']) 
    && !in_array("", [$_POST['sku'], $_POST['name'], $_POST['price'], $_POST['category_id']])) {
        $product->sku = $_POST['sku'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->category_id = $_POST['category_id'];

        if(!$product->create()) {
            echo json_encode(['success' => false]);
            die();
        }
    } else {
        echo json_encode(['success' => false]);
        die();
    }
    
    echo json_encode(['success' => true]);
    die();
?>