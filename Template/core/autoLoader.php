<?php
$autoLoader = function ($class){
    $file = __DIR__ . '/../classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("Autoload failed: Cannot find class '$class' at $file");
    }
};
spl_autoload_register($autoLoader);
?>