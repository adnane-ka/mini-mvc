<?php 

/**
 * Load dependencies
*/
require './vendor/autoload.php';

/**
 * Load app core
*/
require './core/_init.php';

/**
 * Load routes
*/
require './routes.php';

/**
 * Initialize app for the current route
*/
Core\Router::init(Core\Request::getPath());