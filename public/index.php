<?php

require_once '../autoload.php';

try {
    $db = Database::getInstance();
    echo 'Database connected successfully';
} catch (Exception $e) {
    echo 'Error';
}
