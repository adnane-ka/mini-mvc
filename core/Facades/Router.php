<?php 

namespace Core\Facades;

class Router{
    private static $routes = [
        'get' => [],
        'post' => [],
        'patch' => [],
        'put' => [],
        'delete' => []
    ];

    /**
     * Magically handle route registeration per each valid method
     * @param string $name
     * @param array $arguments
     * @return Static
     */
    public static function __callStatic($name, $arguments) {
        # register the route as a new route if is valid
        if (array_key_exists($name, self::$routes)) {
            self::$routes[$name][$arguments[0]] = $arguments[1];
            return new static;
        }

        throw new \BadMethodCallException("Method {$name} does not exist.");
    }

    /**
     * Execute the target controller's method for the given path
     * @return void
    */
    public static function init($path){ 
        # extract lowecased request method
        $httpVerb = strtolower(
            array_key_exists('REQUEST_METHOD', $_POST) 
            ? $_POST['REQUEST_METHOD'] 
            : $_SERVER['REQUEST_METHOD']
        );

        if(is_array($route = self::routeExists($path, $httpVerb))){
            $args = $route['params'];
            $target = $route['target'];

            # extract the target controller method
            $target = explode('@', self::$routes[$httpVerb][$target]);
            $targetController = $target[0];
            $targetMethod = $target[1];

            # initiate new instance of the controller
            $controller = "App\Controllers\\$targetController";
            $controllerInstance = new $controller;

            # call the target controller's method & injected parameters if attached
            call_user_func([new $controller, $targetMethod], ...$args);
        }else{
            throw new \Exception("Page not found", 404);
        }
    }

    /**
     * check whether targeted path exists as a pre-defined route or not
     * if so, return the target controller along with a list of params
     * @param $path
     * @param $method
     * @return array|boolean
    */
    private static function routeExists($path, $method){
        # check for preg match for each route
        foreach (self::$routes[$method] as $route => $target) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            # if the current path matches an existing route pattern
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove the full match

                # extract route params
                $paramNames = [];
                preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $route, $paramNames);
                $paramNames = $paramNames[1];
                
                # return target route along with params
                return [
                    'target' => $route,
                    'params' => array_combine($paramNames, $matches)
                ];
            }
        }
        return false;
    }
}