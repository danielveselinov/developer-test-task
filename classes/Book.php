<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use MyApp\Connection\Connection;
use \MyApp\Product;

class Book extends Product 
{
    private $weigth;

    public function __construct($sku, $name, $price, $type, int|float|string $weigth)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setWeigth($weigth);
    }

    public function save()
    {
        $connection =  Connection::connect();

        $stmt = $connection->prepare('SELECT sku FROM products WHERE sku = ?');
        $stmt->execute([$this->getSku()]);

        if ($stmt->rowCount() != 0) {
            echo json_encode(['auth' => false, 'message' => 'Inserted SKU already exists']);
            exit;
        }

        $stmt = $connection->prepare('INSERT INTO book(weight) VALUES(?)');
        
        if ($stmt->execute([$this->getWeigth()])) {
            $is_book = $connection->lastInsertId();

            $stmt = $connection->prepare('INSERT INTO products(sku, name, price, is_book) VALUES(?, ?, ?, ?)');
            $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $is_book]);

            echo json_encode(['auth' => true]);
            exit;
        }
    }

    /**
     * Get the value of weigth
     */ 
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * Set the value of weigth
     *
     * @return  self
     */ 
    public function setWeigth($weigth)
    {
        $this->weigth = $weigth;

        return $this;
    }
}