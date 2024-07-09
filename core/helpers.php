<?php 

use Core\Request;
use Core\View;

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