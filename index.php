<?php 

/**
 * load helpers for global use
*/
require_once __DIR__ .'/core/helpers.php';

/**
 * Load dependencies
*/
require __DIR__.'./vendor/autoload.php';

/**
 * Load app core
*/
require __DIR__.'./core/_init.php';

/**
 * Load routes
*/
require __DIR__.'./routes.php';

/**
 * Initialize app for the current route
*/
Core\Router::init(Core\Request::getPath());