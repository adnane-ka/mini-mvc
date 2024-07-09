<?php 

namespace Core\Facades;

class View{
    /**
     * Render a view from a given file & data
     * @param string $target
     * @param array $params
    */
    public function render($target, $params){
        if(file_exists("app/views/$target.twig")){
            (new \Core\TwigBuilder)->render($target.'.twig', $params);
        }else{
            throw new \Exception("View file does not exist", 500);
        }
    }
}