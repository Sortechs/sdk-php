<?php
/**
 * Created by PhpStorm.
 * User: msalahat
 * Date: 16/08/17
 * Time: 02:40 م
 */
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    throw new Exception('The Sortechs SDK requires PHP version 5.4 or higher.');
}
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'Sortechs\\';


    // base directory for the namespace prefix
    $baseDir = __DIR__ . '/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relativeClass = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = rtrim($baseDir, '/') . '/' . str_replace('\\', '/', $relativeClass) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});