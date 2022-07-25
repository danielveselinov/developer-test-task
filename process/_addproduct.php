<?php 

require_once __DIR__ . "/../autoload.php";

use MyApp\Book;
use MyApp\DVD;
use MyApp\Furniture;

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}

if ($_POST['productType'] == '1') {
    
    $object = new DVD($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['size']);
    $object->emptyFields([$_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['size']]);
    return $object->save();
}

if ($_POST['productType'] == '2') {
   
    $object = new Furniture($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['height'], $_POST['width'], $_POST['length']);
    $object->emptyFields([$_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['height'], $_POST['width'], $_POST['length']]);

    return $object->save();
}

if ($_POST['productType'] == '3') {
    
    $object = new Book($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['weight']);
    $object->emptyFields([$_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $_POST['weight']]);
    return $object->save();
}