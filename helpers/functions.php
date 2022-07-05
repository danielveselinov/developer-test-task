<?php 

/**
 * Custom redirect function
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    die();
}


/**
 * Check if any empty fields
 */
function emptyFields($data)
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
