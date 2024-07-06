<?php 

if(!function_exists('view')){
    function view($target, $params = []){
        $file = "app/views/$target.view.php";
        if(file_exists($file)){
            extract($params);
            include $file;
        }else{
            throw new Exception("View file does not exist", 500);
        }
    }
}