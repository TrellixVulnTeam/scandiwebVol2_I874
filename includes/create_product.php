<?php 
    include_once 'layout_header.php';
?>

<section class="form-container">
    <form action="process.php" method="post" class="form" id="formElem">
        <!-- <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">SKU</span>
            <input required type="text" name="sku" id="sku" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div> -->
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">SKU</span>
            <input required id="sku" name="sku" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <!-- <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
            </div>
            <input required type="text" name="name" id="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-lg">
        </div> -->
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
            <input required id="name" name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>

        <!-- <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Price</span>
            </div>
            <input required type="text" name="price" id="price" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-lg">
        </div> -->
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Price</span>
            <input required id="price" name="price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>


        <!-- <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select> -->


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