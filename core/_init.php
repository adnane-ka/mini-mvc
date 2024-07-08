<?php 

require_once __DIR__ .'/helpers.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();