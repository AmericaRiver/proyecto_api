<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->group(['middleware'=>['cors']], function() use($router){
  $router->get('/login/{id_instructor}/{password}', 'AuthController@login');
    
//});

$router->group(['middleware'=>['auth']], function() use($router){
    $router->get('/alumnos', 'AlumnosController@index');
    $router->get('/alumnos/{id_alumno}', 'AlumnosController@get');
    $router->post('/alumnos', 'AlumnosController@create');
    $router->put('/alumnos/{id_alumno}', 'AlumnosController@update');
    $router->delete('/alumnos/{id_alumno}', 'AlumnosController@destroy');
}
);
    $router->get('/instructores', 'InstructoresController@index');
    $router->get('/instructores/{id_instructor}', 'InstructoresController@get');
    $router->post('/instructores', 'InstructoresController@create');
    $router->put('/instructores/{id_instructor}', 'InstructoresController@update');
    $router->delete('/instructores/{id_instructor}', 'InstructoresController@destroy');

   /* $router->get('/post', 'PostController@index');
    $router->get('/post/{id_topic}', 'PostController@get');
    $router->post('/post', 'PostController@create');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');*/
