<?php 

use Core\Router;

Router::get('users', 'UsersController@index');
Router::get('users/{user}', 'UsersController@show');