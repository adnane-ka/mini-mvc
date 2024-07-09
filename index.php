<?php 

/**
 * Load dependencies
*/
require __DIR__.'./vendor/autoload.php';

/**
 * load helpers for global use
*/
require_once __DIR__ .'/core/helpers.php';

/**
 * Initialize Dotenv
*/
require __DIR__.'./core/_init.php';

/**
 * Load routes
*/
require __DIR__.'./routes.php';

/**
 * Initialize app for the current request URI
*/
Core\App::getInstance()->getApp();