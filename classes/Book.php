<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use \MyApp\Product;

class Book extends Product 
{
    private $weigth;

    public function __construct($sku, $name, $price, $type, int|float $weigth)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setWeigth($weigth);
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

    public function getData()
    {
        
    }
}