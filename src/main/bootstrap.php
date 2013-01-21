<?php

spl_autoload_register(
    function ($className) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';

        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        $srcFile = __DIR__ . '/' . $fileName;
        $testFile = __DIR__ . '/../../test/' . $fileName;

        if (file_exists($srcFile)) {
            require $srcFile;
        } elseif (file_exists($testFile)) {
            require $testFile;
        } else {
            throw new \Exception("Could not resolve file for class '$className'. Searched '$srcFile' and '$testFile'.");
        }
    }
);
