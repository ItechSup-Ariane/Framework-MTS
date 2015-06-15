<?php
spl_autoload_register(function ($class) {

    $namespace_separator = '\\';

    $prefix = 'Itechsup' . $namespace_separator;

    $base_dir = 'src/Itechsup';

    $prefix_len = strlen($prefix);

    if (strncasecmp($class, $prefix, $prefix_len) !== 0) {
        return;
    }
    $relative_class = substr($class, $prefix_len);

    $relative_file = str_replace($namespace_separator, '/', $relative_class) . '.php';

    $file = $base_dir . '/' . $relative_file;

    if (file_exists($file)) {
        require_once $file;
    }
});
