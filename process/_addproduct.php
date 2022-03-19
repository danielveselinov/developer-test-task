<?php 

require_once __DIR__ . "/../autoload.php";

use \MyApp\Product;
use \MyApp\DVD;
use \MyApp\Book;
use \MyApp\Furniture;

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}
