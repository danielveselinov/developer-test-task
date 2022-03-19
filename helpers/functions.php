<?php 

/**
 * Custom redirect function
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    die();
}
