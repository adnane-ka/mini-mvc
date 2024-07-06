<?php 

class View{
    /**
     * Render a view from a given file & data
     * @param string $target
     * @param array $params
    */
    public function render($target, $params){
        $file = "app/views/$target.view.php";
        if(file_exists($file)){
            extract($params);
            include $file;
        }else{
            throw new \Exception("View file does not exist", 500);
        }
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