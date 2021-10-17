<?php 
    include_once 'database.php';
    include_once 'product.php';
    include_once 'category.php';

    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
    $category = new Category($db);

    // include_once 'layout_header.php';

    if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && !in_array("", [$_POST['sku'], $_POST['name'], $_POST['price']]) ) {
        $product->sku = $_POST['sku'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];

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