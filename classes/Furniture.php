<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use MyApp\Connection\Connection;
use \MyApp\Product;

class Furniture extends Product
{
    private $heigth;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $type, int|float|string $heigth, int|float|string $width, int|float|string $length)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setHeigth($heigth);
        $this->setWidth($width);
        $this->setLength($length);
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

        $stmt = $connection->prepare('INSERT INTO furniture(height, width, length) VALUES(?, ?, ?)');
        
        if ($stmt->execute([$this->getHeigth(), $this->getWidth(), $this->getLength()])) {
            $is_furniture = $connection->lastInsertId();

            $stmt = $connection->prepare('INSERT INTO products(sku, name, price, is_furniture) VALUES(?, ?, ?, ?)');
            $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $is_furniture]);

            echo json_encode(['auth' => true]);
            exit;
        }
    }

    /**
     * Get the value of heigth
     */ 
    public function getHeigth()
    {
        return $this->heigth;
    }

    /**
     * Set the value of heigth
     *
     * @return  self
     */ 
    public function setHeigth($heigth)
    {
        $this->heigth = $heigth;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }
}