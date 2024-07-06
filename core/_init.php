<?php 

require './core/View.php';
require './core/Request.php';
require './core/Router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();