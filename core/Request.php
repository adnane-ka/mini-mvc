<?php 

namespace Core;

class Request{
    public static function getPath(){
        $requestURI = $_SERVER["REQUEST_URI"];
        $requestURI = strlen($_ENV["SUB_DIRECTORY"]) > 0 ? str_replace('/'.$_ENV["SUB_DIRECTORY"].'/', '', $requestURI) : str_replace('/', '', $requestURI);
        $requestURI = trim($requestURI, '/');
        return $requestURI;
    }
}