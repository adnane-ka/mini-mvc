<?php 

namespace Core;

class App{
    protected static $instance;
    protected $app;

    /**
     * Ensure private construction to prevent direct construction calls
    */
    private function __construct(){
        $this->app = Router::init(Request::getRequestURI());
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
     * Get the initiated app 
     * @return App
    */
    public function getApp(){
        return $this->app;
    }
}