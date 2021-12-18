<?php

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

Route::get('download/{dir}/{file}','FileDownloadController@download');


Route::namespace('guest')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/','WelcomeController@index');

    Route::get('/situation','SituationController@active');
    Route::get('/situation/active','SituationController@active');
    Route::get('/situation/death','SituationController@death');
    Route::get('/situation/recovered','SituationController@recovered');
    Route::get('/situation/show/{table}/{id}','SituationController@show');


    Route::resource('knowledge','KnowledgeController');
    Route::get('knowledge/page/{id}','KnowledgeController@page');

    Route::resource('news','NewsController');
    Route::get('news/page/{id}','NewsController@page');
    Route::get('posts','PostsController@index');

    Route::get('feedback','FeedBackController@index');
    Route::post('feedback/store','FeedBackController@store');

    Route::get('about',function (){
        return view('guest.about');
    });

});




Auth::routes();

Route::post('slient','AjaxRequestController@level');

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'],function (){

    Route::resource('ajax','AjaxRequestController');

    Route::resource('dashboard','DashboardController');
    Route::resource('situation','SituationController') ;
    Route::resource('active','ActiveCasesController') ;
    Route::resource('death','DeathCasesController') ;
    Route::resource('recovered','RecoveredCasesController');

    Route::get('knowledge','KnowledgeController@index');
    Route::post('knowledge/store','KnowledgeController@store');
    Route::get('knowledge/show/{id}','KnowledgeController@show');
    Route::get('knowledge/edit/{id}','KnowledgeController@edit');
    Route::post('knowledge/update/{id}','KnowledgeController@update');
    Route::get('knowledge/destroy/{id}','KnowledgeController@destroy');
    Route::get('knowledge/page/{id}','KnowledgeController@page');


    Route::resource('admin_news','NewsController');
    Route::get('admin_news/page/{id}','NewsController@page');

    Route::resource('posts','PostsController');

    Route::resource('feedback','FeedBackController');
    Route::post('feedback/search','FeedBackController@search');

    Route::resource('user','UserController');
    Route::resource('visitor','VisitorTrackController');
});