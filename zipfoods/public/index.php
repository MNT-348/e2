<?php

# This is the main controller
# All traffic should route through here

# Define constants
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/../');

# Initialize Composer autoloading
require DOC_ROOT . '/vendor/autoload.php';

# Initialize App object
$app = new E2\App();

# Invoke router
echo $app->route();