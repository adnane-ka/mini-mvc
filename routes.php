<?php 

use Core\Router;

/**
 * Users Routes Example
*/
Router::get('', 'UsersController@index');
Router::post('', 'UsersController@store');
Router::get('{user}', 'UsersController@show');
Router::delete('{user}', 'UsersController@delete');
Router::patch('{user}', 'UsersController@update');