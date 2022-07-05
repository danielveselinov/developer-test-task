<?php
$title = "Product List Page";
require __DIR__ . "/layouts/head.php";
require_once __DIR__ . "/database/connection.php";
?>
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between border-bottom py-3">
            <h1 class="font-weight-bold text-capitalize">Product list</h1>
            <div class="d-flex align-items-center">
                <a href="/add-product.php" class="btn btn-primary">ADD</a>
                <button id="delete-product-btn" class="btn btn-danger ml-3">MASS DELETE</button>
            </div>
        </div>

        <div class="row">
            <?php
            use \MyApp\Connection\Connection;

            $connection = Connection::connect();

            $stmt = $connection->query("SELECT products.*,
            CASE
            WHEN `products`.`is_book` IS NOT NULL 
            THEN 
                CONCAT('Weight: ', `book`.`weight`, ' KG')
            WHEN
                `products`.`is_furniture` IS NOT NULL
            THEN
                CONCAT('Dimension: ',
                    `furniture`.`height`,
                    'x',
                    `furniture`.`width`,
                    'x',
                    `furniture`.`length`)
            ELSE CONCAT('Size: ',
                        `dvd`.`sizeMB`, ' MB')
            END AS attributes
            FROM `products` 
            LEFT JOIN `book` ON `products`.`is_book` = `book`.`id`
            LEFT JOIN `dvd` ON `products`.`is_dvd` = `dvd`.`id`
            LEFT JOIN `furniture` ON `products`.`is_furniture` = `furniture`.`id`
                WHERE 1;
            ");


            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='col-3 col-md-3 mt-4'>
            <div class='card'>
                <input type='checkbox' class='delete-checkbox' data-id='{$row['id']}'/>
                <div class='text-center p-3'>
                    <p class='m-0'>{$row["sku"]}</p>
                    <p class='m-0'>{$row["name"]}</p>
                    <p class='m-0'>{$row["price"]}\$</p>
                    <p class='m-0'>{$row["attributes"]}</p>
                </div>
            </div>
        </div>";
                }
            } else {
                echo "No data found yet..";
            }
            ?>
        </div>
    </div>
</section>
<?php require __DIR__ . "/layouts/footer.php"; ?>