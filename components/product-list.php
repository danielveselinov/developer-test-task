<?php 

use \MyApp\Connection\Connection;

$connection = Connection::connect();

$stmt = $connection->query("SELECT * FROM products WHERE 1");

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch()) {
        echo "<div class='col-3 col-md-3 mt-4'>
            <div class='card'>
                <input type='checkbox' name='' class='delete-checkbox custom-checkbox mt-3 mx-3'>
                <div class='text-center p-3'>
                    <p class='m-0'>{$row["sku"]}</p>
                    <p class='m-0'>{$row["name"]}</p>
                    <p class='m-0'>{$row["price"]}\$</p>
                    <p class='m-0'>{$row["attribute"]}</p>
                </div>
            </div>
        </div>";
    }
} else {
    echo "No data found yet..";
}
$connection = Connection::close();