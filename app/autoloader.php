<?php 
function loadClass($className)
{
    $file = __DIR__ . '/../app/'. str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
?>