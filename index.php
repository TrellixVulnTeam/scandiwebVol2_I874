<?php
    // page given in URL parameter, default page is one
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // set number of records per page
    $records_per_page = 5;
    
    // calculate for the query LIMIT clause
    $from_record_num = ($records_per_page * $page) - $records_per_page;
    
    // include database and object files
    include_once 'includes/database.php';
    include_once 'includes/product.php';
    
    // instantiate database and objects
    $database = new Database();
    $db = $database->getConnection();
    
    $product = new Product($db);
    
    // query products
    $stmt = $product->readAll($from_record_num, $records_per_page);
    $num = $stmt->rowCount();

    // display the products if there are any
    if($num>0){
    
        echo "<table class='table table-hover table-responsive table-bordered'>";
            echo "<tr>";
                echo "<th>Product</th>";
                echo "<th>Price</th>";
                echo "<th>Description</th>";
                echo "<th>Category</th>";
                echo "<th>Actions</th>";
            echo "</tr>";
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
                extract($row);
    
                echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$price}</td>";
                    echo "<td>{$description}</td>";
                    echo "<td>";
                        $category->id = $category_id;
                        $category->readName();
                        echo $category->name;
                    echo "</td>";
    
                    echo "<td>";
                        // read one, edit and delete button will be here
                    echo "</td>";
    
                echo "</tr>";
    
            }
    
        echo "</table>";
    
        // paging buttons will be here
    }
    
    // tell the user there are no products
    else{
        echo "<div class='alert alert-info'>No products found.</div>";
    }
    include_once "includes/layout_header.php";
    
    // contents will be here
    
    // set page footer
    include_once "includes/layout_footer.php";
?>