<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{book_id}', 'BookController@show');
$router->put('/books/{book_id}', 'BookController@update');
$router->patch('/books/{book_id}', 'BookController@update');
$router->delete('/books/{book_id}', 'BookController@destroy');