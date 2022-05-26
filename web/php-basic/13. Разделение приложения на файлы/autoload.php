<?php

spl_autoload_register(function ($className) {
    if (file_exists('entities/' . $className . '.php'))
        require_once 'entities/' . $className . '.php';
});
