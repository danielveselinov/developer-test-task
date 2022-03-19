<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use \MyApp\Product;

class DVD extends Product 
{
    private $size;

    public function __construct($sku, $name, $price, $type, int $size)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setSize($size);
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