<?php 

namespace Core;

class Request{
    /**
     * Get the current request path
     * @return string
    */
    public static function getPath(){
        $requestURI = $_SERVER["REQUEST_URI"];
        $requestURI = strlen($_ENV["SUB_DIRECTORY"]) > 0 ? str_replace('/'.$_ENV["SUB_DIRECTORY"].'/', '', $requestURI) : str_replace('/', '', $requestURI);
        $requestURI = trim($requestURI, '/');
        return $requestURI;
    }

    /**
     * get all request parameters
     * @return array
    */
    public static function all(){
        self::sanitizeParams();

        return $_SERVER["REQUEST_METHOD"] == 'POST' ? $_POST : $_GET;
    }

    /**
     * get certain request parameters
     * @return array
    */
    public static function only($wanted){
        $all = self::all();
        $result = [];

        foreach ($all as $key => $value) {
            if(in_array($key, $wanted)){
                $result += [$key => $value];
            }
        }

        return $result;
    }

    /**
     * redirect to a given location
    */
    public static function redirect($uri){
        return header('Location: /' . $_ENV['SUB_DIRECTORY'] . '/' . $uri);
    }

    /**
     * sanitizes a post-request inputs
     * @return void
    */
    private static function sanitizeParams(){
        $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }
}