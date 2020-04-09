<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function (){
    return 'About';
})->name('about');

Route::get('/posts/{id}',function ($id){
    return 'Posts: '.$id;
})->where('id','[0-9]+');

Route::get('/posts/{id}/comments/{comment?}',function ($id, $comment=101){
    return 'Posts: '.$id. " Commnets ".$comment;
})->where(['id'=>'[0-9]+','comment'=>'[0-9]+']);

Route::post('/posts',function (){
    return 'Posts';
});

Route::match(['get','post'],'/posts-Two',function (){
    return 'Post Two';
});

Route::group(['prefix'=>'/post', 'as'=>'post.'],function (){
    Route::get('/',function (){
        return "
        <div>Posts</div>
        <a href='".route('about')."'>About</a>
        <a href='".route('post.show',['id'=>1])."'>Post first</a>
    ";
    })->name('index');
    Route::get('/{id}',function ($id){
        return 'Posts: '.$id;
    })->name('show');
});*/
Route::group(['prefix'=>'/thinks'],function (){

    Route::get('/','ThinksController@index');

    Route::get('/{id}','ThinksController@show')
        ->where('id','[0-9]+');

    Route::post('/','ThinksController@store');

    Route::put('/{id}','ThinksController@update');

    Route::delete('/{id}','ThinksController@destroy');
});

Route::get('/js_framework/test','JSFrameworkController@test');

Route::resources([
    '/js_framework'=>'JSFrameworkController',
    '/php_framework'=>'PHPFrameworkController'
]);

