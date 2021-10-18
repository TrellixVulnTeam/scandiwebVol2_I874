<?php 
    include_once 'config/db_init.php';
    include_once 'objects/category.php';
    include_once 'layout_header.php';
?>

<section class="form-container">
    <form action="process.php" method="post" class="form" id="formElem">
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">SKU</span>
            <input required id="sku" name="sku" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
            <input required id="name" name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Price</span>
            <input required id="price" name="price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <div>
            <?php 
                $category = new Category($db);
                $stmt = $category->read();



                echo "<select class='form-control' name='category_id'>";
                    echo "<option>Select item...</option>";

                    while ($row_category = $stmt->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row_category['id'];?>"> <?php echo $row_category['name']; ?> </option>;
                    <?php } ?>
            <?php
                echo "</select>";
            ?>
        </div>

        <div>
            <input type="submit" name="save" value="Save" class="btn-primary">
        </div>

        <script>
            formElem.onsubmit = (e) => {
                e.preventDefault();

                fetch('process.php', {
                    method: "POST",
                    body: new FormData(formElem)
                }).then((response) => {
                    response.json().then((data) => data.success ? alert('succ') : alert('failed'));
                }).catch((error) => {
                    alert("FAILED");
                });
            };
        </script>
        
    </form>
</section>

<?php 
    include_once "layout_footer.php";
?>