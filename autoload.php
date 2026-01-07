<?php
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/app/';
    $paths = ['core','models','controllers','services','repositories','interfaces','traits'];
    foreach ($paths as $path) {
        $file = $baseDir . $path . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
