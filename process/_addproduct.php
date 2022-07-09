<?php 

require_once __DIR__ . "/../autoload.php";

use MyApp\Book;
use MyApp\DVD;
use MyApp\Furniture;

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}

if ($_POST['process'] === 'dvdInsert') {
    DVD::insert('dvd', $_POST);
} else if ($_POST['process'] === 'furnitureInsert') {
    Furniture::insert('furniture', $_POST);
} else if ($_POST['process'] === 'bookInsert') {
    Book::insert('book', $_POST);
}