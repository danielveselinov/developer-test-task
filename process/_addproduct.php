<?php 

require_once __DIR__ . "/../autoload.php";

use \MyApp\Product;
use \MyApp\DVD;
use \MyApp\Book;
use \MyApp\Furniture;
use \MyApp\Validation\Validation;

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}


try {
    if (!isset($_POST["productType"])) {
            $_SESSION["errors"] = "Please select type switcher";
    } else if ($_POST["productType"] == 1) {
        $validate = Validation::empty([$_POST["sku"], $_POST["name"], $_POST["price"], $_POST["size"]]);
    } else if ($_POST["productType"] == 2) {
        $validate = Validation::empty([$_POST["sku"], $_POST["name"], $_POST["price"], $_POST["weigth"]]);
    } else if ($_POST["productType"] == 3) {
        $validate = Validation::empty([$_POST["sku"], $_POST["name"], $_POST["price"], $_POST["height"], $_POST["width"], $_POST["length"]]);
    }
} catch (\Exception $ex) {
    echo "Error";
    die();
}


// if ($_POST["productType"] == 1) {
//     $validate = Validation::empty([$_POST["sku"], $_POST["name"], $_POST["price"], $_POST["size"]]);
// }



echo "<pre>";
print_r($_SESSION);