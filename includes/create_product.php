<?php 
    include_once 'layout_header.php';
?>

<section class="form-container">
    <form action="process.php" method="post" class="form" id="formElem">
        <div class="input-group mb-3 input-width">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">SKU</span>
            </div>
            <input required type="text" name="sku" id="sku" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 input-width">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>
            <input required type="text" name="name" id="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 input-width">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
            </div>
            <input required type="text" name="price" id="price" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <input type="submit" name="save" value="Save" class="btn-primary">

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


<!-- echo htmlspecialchars($_SERVER["PHP_SELF"]); -->