<?php 

use Core\Facades\Request;
use Core\Facades\View;

/**
 * Globally Declare the `url` helper
*/
if(!function_exists('url')){
    function url($path){
        return Request::url($path);
    }
}

/**
 * Globally Declare the `view` helper
*/
if(!function_exists('view')){
    function view($target, $params = []){
        return (new View)->render($target, $params);
    }
}