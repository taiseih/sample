<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

//|        | GET|HEAD  | book                | book.index   | App\Http\Controllers\BookController@index                  | web                                      |
//|        | POST      | book                | book.store   | App\Http\Controllers\BookController@store                  | web                                      |
//|        | GET|HEAD  | book/create         | book.create  | App\Http\Controllers\BookController@create                 | web                                      |
//|        | GET|HEAD  | book/{book}         | book.show    | App\Http\Controllers\BookController@show                   | web                                      |
//|        | PUT|PATCH | book/{book}         | book.update  | App\Http\Controllers\BookController@update                 | web                                      |
//|        | DELETE    | book/{book}         | book.destroy | App\Http\Controllers\BookController@destroy                | web                                      |
//|        | GET|HEAD  | book/{book}/edit    | book.edit    | App\Http\Controllers\BookController@edit                   | web                                      |

//Route::get('book/dddd', BookController::class.'@dddd'); //helloを表示するためだけのルーティング　BookControllerクラスの住所を::classで指定してddddを表示する

Route::get('book', BookController::class.'@index');
Route::post('book', BookController::class.'@store');
Route::get('book/create', BookController::class.'@create');
Route::get('book/{book}', BookController::class.'@show');
Route::put('book/{book}', BookController::class.'@update');
Route::delete('book/{book}', BookController::class.'@destroy');
Route::get('book/{book}/edit', BookController::class.'@edit');

//
//上の面倒なルートを記述しなくても下の一文を書けばlaravelが自動でルーティングを指定してくれる
//Route::resource('book', BookController::class);










