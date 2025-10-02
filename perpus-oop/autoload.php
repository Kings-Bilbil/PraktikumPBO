<?php
// Autoloading PSR-4 sederhana untuk namespace Library (src/) dan sub-namespace MVC
spl_autoload_register(function ($class) {
    // Untuk src/ (Library\*)
    if (strncmp('Library\\', $class, 8) === 0) {
        $baseDir = __DIR__ . '/src/';
        $relativeClass = substr($class, 8);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
        return;
    }

    // Untuk MVC (Library\Model\*, Library\View\*, Library\Controller\*)
    $mvcPrefixes = ['Library\\Model\\', 'Library\\View\\', 'Library\\Controller\\'];
    $mvcBaseDir = __DIR__ . '/mvc/';
    foreach ($mvcPrefixes as $prefix) {
        if (strncmp($prefix, $class, strlen($prefix)) === 0) {
            $relativeClass = substr($class, strlen($prefix));
            $file = $mvcBaseDir . str_replace('\\', '/', $relativeClass) . '.php';
            if (file_exists($file)) {
                require $file;
            }
            return;
        }
    }
});
