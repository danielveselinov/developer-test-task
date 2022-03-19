<?php 

namespace MyApp;

require_once __DIR__ . "/Product.php";

use \MyApp\Product;

class Furniture extends Product 
{
    private $heigth;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $type, int|float $heigth, int|float $width, int|float $length)
    {
        parent::__construct($sku, $name, $price, $type);
        $this->setHeigth($heigth);
        $this->setWidth($width);
        $this->setLength($length);
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