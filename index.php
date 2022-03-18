<?php $title = "Product List Page"; require __DIR__ . "/layouts/head.php"; ?>
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom py-3">
                <h1 class="font-weight-bold text-capitalize">Product list</h1>
                <div class="d-flex align-items-center">
                    <a href="./add-product.php" class="btn btn-primary">ADD</a>
                    <button id="delete-product-btn" class="btn btn-danger ml-3">MASS DELETE</button>
                </div>
            </div>

            <div class="row">
                <div class="col-3 col-md-3 mt-4">
                    <div class="card">
                        <input type="checkbox" name="" class="delete-checkbox custom-checkbox mt-3 mx-3">
                        <div class="text-center p-3">
                            <p class="m-0">SKU</p>
                            <p class="m-0">Name</p>
                            <p class="m-0">Price $</p>
                            <p class="m-0">Size</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
<?php require __DIR__ . "/layouts/footer.php"; ?>
    