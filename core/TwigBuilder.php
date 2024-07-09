<?php 

namespace Core;

class TwigBuilder{
    protected $instance;
    protected $loader;

    /**
     * Using Twig array loader to locate templates & initiate loader
     * @return self
    */
    public function render($filePath, $vars){
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../app/views/');

        $twig = new \Twig\Environment($loader, [
           // 'cache' => __DIR__.'/../app/cache',
        ]);

        echo $twig->render($filePath, $vars);
    }
}