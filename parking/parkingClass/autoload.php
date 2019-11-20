<?php
spl_autoload_register('loadClass');
function loadClass(string $className)
{
    $path = str_replace('\\', '/', $className) . '.php';
    if (is_file($path)) {
        require_once $path ;
        return true;
    }
    return false;
}