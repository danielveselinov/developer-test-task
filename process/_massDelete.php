<?php

use MyApp\Connection\Connection;
use MyApp\Product;

require_once __DIR__ . "/../autoload.php";


if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}


if ($_POST['process'] === 'massDelete') {
    Product::massDelete($_POST);
}
