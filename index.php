<?php
$title = "Product List Page";
require __DIR__ . "/layouts/head.php";
require_once __DIR__ . '/autoload.php';

use MyApp\Product;
?>
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
            <?php Product::listAll(); ?>
        </div>
    </div>
</section>
<?php require __DIR__ . "/layouts/footer.php"; ?>