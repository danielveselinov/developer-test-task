<?php

namespace MyApp;

use MyApp\Connection\Connection;
use PDO;

abstract class Product
{
    private $sku;
    private $name;
    private $price;
    private $type;

    public function __construct(mixed $sku, string $name, int|float|string $price, int|string $type)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($type);
    }

    public static function listAll()
    {
        $connection = Connection::connect();

        $stmt = $connection->query("SELECT products.*,
        CASE
        WHEN `products`.`is_book` IS NOT NULL 
        THEN 
            CONCAT('Weight: ', `book`.`weight`, ' KG')
        WHEN
            `products`.`is_furniture` IS NOT NULL
        THEN
            CONCAT('Dimension: ',
                `furniture`.`height`,
                'x',
                `furniture`.`width`,
                'x',
                `furniture`.`length`)
        ELSE CONCAT('Size: ',
                    `dvd`.`sizeMB`, ' MB')
        END AS attributes
        FROM `products` 
        LEFT JOIN `book` ON `products`.`is_book` = `book`.`id`
        LEFT JOIN `dvd` ON `products`.`is_dvd` = `dvd`.`id`
        LEFT JOIN `furniture` ON `products`.`is_furniture` = `furniture`.`id`
            WHERE 1;
        ");


        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='col-3 col-md-3 mt-4'>
                    <div class='card'>
                        <input type='checkbox' class='delete-checkbox' data-id='{$row['id']}'/>
                        <div class='text-center p-3'>
                            <p class='m-0'>{$row["sku"]}</p>
                            <p class='m-0'>{$row["name"]}</p>
                            <p class='m-0'>{$row["price"]}\$</p>
                            <p class='m-0'>{$row["attributes"]}</p>
                        </div>
                    </div>
                </div>";
            }
        }
    }

    public static function massDelete($request) 
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare('DELETE FROM products WHERE id IN ('.join(',', $request['filter_options']).')');

        if (!$stmt->execute()) {
            echo json_encode(['auth' => false, 'message' => 'An error occurred']);
            exit;
        }

        echo json_encode(['auth' => true]);
        exit;
    }

    public function emptyFields($data)
    {
        $flag = false;
    
        foreach ($data as $value) {
            if (isset($value)) {
                if (empty($value)) {
                    $flag = true;
                } 
            }
        }
    
        if ($flag) {
            echo json_encode(['auth' => false, 'message' => 'Please, submit required data']);
            exit;
        }
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
