<?php 

namespace MyApp;

require_once __DIR__ . "/../interfaces/Savable.php";

use MyApp\Connection\Connection;
use \MyApp\Savable;

abstract class Product implements Savable
{
    private $sku;
    private $name;
    private $price;
    private $type;

    public function __construct(mixed $sku, string $name, int|float $price, int $type)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($type);
    }

    public static function insert($request) 
    {
        $connection =  Connection::connect();

        $stmt = $connection->prepare('SELECT sku FROM products WHERE sku = ?');
        $stmt->execute([$request['sku']]);

        if ($stmt->rowCount() != 0) {
            echo json_encode(['auth' => false, 'message' => 'Inserted SKU already exists']);
            exit;
        }

        $stmt = $connection->prepare('INSERT INTO book(weight) VALUES(?)');
        
        if ($stmt->execute([$request['weight']])) {
            $is_book = $connection->lastInsertId();

            $stmt = $connection->prepare('INSERT INTO products(sku, name, price, is_book) VALUES(?, ?, ?, ?)');
            $stmt->execute([$request['sku'], $request['name'], $request['price'], $is_book]);

            echo json_encode(['auth' => true]);
            exit;

        }

        echo json_encode(['auth' => false, 'message' => 'An error occurred']);
        exit;
    }

    /**
     * Get the value of sku
     */ 
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @return  self
     */ 
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}