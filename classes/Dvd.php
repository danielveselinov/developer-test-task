<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use MyApp\Connection\Connection;
use \MyApp\Product;

class DVD extends Product 
{
    private $size;

    public function __construct($sku, $name, $price, $type, int|string|float $size)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setSize($size);
    }

    public function save()
    {
        $connection = Connection::connect();

        $stmt = $connection->prepare('SELECT sku FROM products WHERE sku = ?');
        $stmt->execute([$this->getSku()]);

        if ($stmt->rowCount() != 0) {
            echo json_encode(['auth' => false, 'message' => 'Inserted SKU already exists']);
            exit;
        }

        $stmt = $connection->prepare('INSERT INTO dvd(sizeMB) VALUES(?)');
        
        if ($stmt->execute([$this->getSize()])) {
            $is_dvd = $connection->lastInsertId();

            $stmt = $connection->prepare('INSERT INTO products(sku, name, price, is_dvd) VALUES(?, ?, ?, ?)');
            $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $is_dvd]);

            echo json_encode(['auth' => true]);
            exit;
        }
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}