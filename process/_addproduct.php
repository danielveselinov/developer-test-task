<?php 

require_once __DIR__ . "/../autoload.php";

use \MyApp\DVD;
use \MyApp\Book;
use \MyApp\Furniture;

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}


if ($_POST['process'] === 'dvdInsert') {
    emptyFields($_POST);

    DVD::insert($_POST);

} else if ($_POST['process'] === 'furnitureInsert') {
    emptyFields($_POST);

    Furniture::insert($_POST);
} else if ($_POST['process'] === 'bookInsert') {
    emptyFields($_POST);

    Book::insert($_POST);
}