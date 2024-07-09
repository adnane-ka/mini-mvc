<?php 

namespace Core;
use Core\Facades\Router;
use Core\Facades\Request;

class App{
    protected static $instance;
    
    /**
     * Ensure private construction to prevent direct construction calls
    */
    private function __construct(){
        Router::init(Request::getRequestURI());
    }

    /**
     * Controls access to the App singleton 
     * @return App
     */
    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Prevent Unserialization
    */
    public function __wakeup(){}

    /**
     * Prevent Cloning
    */
    protected function __clone(){}
}