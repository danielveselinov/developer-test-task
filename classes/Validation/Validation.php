<?php 

namespace MyApp\Validation;

class Validation 
{
    private static $errors = [];
    public static function empty(array $fields)
    {
        foreach ($fields as $key => $value) {
            if (isset($value)) {
                if (empty($value)) {
                    self::$errors[$key] = "The {$key} is required";
                }
            }
        }
        $_SESSION['errors'] = self::$errors;
    }
}