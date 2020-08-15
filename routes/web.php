<?php
//use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;
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
//routes for todos
// Route::middleware('auth')->group(function(){
    Route::resource('todo', 'TodoController');
    //Route::resource('todo', 'TodoController')->middleware('auth');
    Route::put('/todos/complete/{todo}','TodoController@complete')->name('todo.complete');
    Route::put('/todos/incomplete/{todo}','TodoController@incomplete')->name('todo.incomplete');
//});

/*Route::get('/todos','TodoController@index')->name('todos.index');
Route::get('/todos/create','TodoController@create');
Route::post('/todos/create','TodoController@store');
Route::get('/todos/{todo}/edit','TodoController@edit');
Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');
Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'UserController@index');

Route::post('/upload','UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

