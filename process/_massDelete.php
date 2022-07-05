<?php

use MyApp\Connection\Connection;

require_once __DIR__ . "/../autoload.php";


if ($_SERVER['REQUEST_METHOD'] != "POST") {
    redirect("../add-product.php");
}


if ($_POST['process'] === 'massDelete') {    

    $connection = Connection::connect();

    $stmt = $connection->prepare('DELETE FROM products WHERE id IN ('.join(',', $_POST['filter_options']).')');

    if (!$stmt->execute()) {
        echo json_encode(['auth' => false, 'message' => 'An error occurred']);
        exit;
    }

    echo json_encode(['auth' => true]);
    exit;
    
}
