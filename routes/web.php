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

//Route::get('/home', 'PageController@index')->name('home');


Route::get('/', 'PageController@index')->name('home');          // Главный

Route::get('/category/{id}', 'PageController@showFromCategory');           // Категории

Route::get('/create/question','PageController@create')->name('createQuestion');         // Задать вопрос
Route::post('/created','PageController@store');         // Сохронить вопрос в базе данных

Route::get('/answers/{id}','PageController@show');          // Посмотрет ответ


    Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('/login', ['as' => '', 'uses' => 'Auth\LoginController@login']);


Route::group(['prefix' => 'admin','middleware' => 'auth'],function ()           // Админ групп
{

    Route::get('/panel', 'AdminController@index')->name('adminPanel');         // Панель Админа

    Route::get('/logout','Auth\LoginController@logout')->name('logout');        // Выход из Админа

    Route::get('/setting','AdminController@adminSetting')->name('adminSettings');       // Настроики Админов

    Route::get('/create/user','Auth\RegisterController@showRegistrationForm')->name('createUser');
    Route::post('/create/user','AdminController@create');                                // Созать нового администратора

    Route::get('/change/password/{name}/{id}', 'AdminController@showFormReset')->name('resetPassword');
    Route::post('/change/password/{id}', 'AdminController@resetPassword');                          // Изменить пароль

    Route::get('/delete/user/{id}','AdminController@destroy')->name('deleteUser');      // Удалить администратора

    Route::get('/theme/setting','ThemeController@index')->name('showThemes');
    Route::get('/delete/theme/{id}','ThemeController@deleteTheme')->name('deleteTheme');
    Route::get('/create/theme','ThemeController@themeForm')->name('createTheme');
    Route::post('/create/theme','ThemeController@createTheme');

    Route::get('/theme/{id}','ThemeController@settingsTheme');

    Route::get('/hide/question/{category_id}/{id}','ThemeController@hideQuestion')->name('hideQuestion');
    Route::get('/publish/question/{category_id}/{id}','ThemeController@publishQuestion')->name('publishQuestion');

    Route::get('/change/question/{category_id}/{id}','ThemeController@changeQuestion')->name('changeQuestion');
    Route::post('/change/question/{category_id}/{id}','PageController@edit');

    Route::get('/reply/answer/{category_id}/{id}','ThemeController@showFormReply')->name('formReply');
    Route::post('/reply/answer/{category_id}/{id}','PageController@replyAnswer');

    Route::post('/move/question/{id}','ThemeController@moveQuestion');

    Route::get('/delete/question/{category_id}/{id}','PageController@destroy');

    Route::get('/without/answer','ThemeController@withoutAnswer')->name('withoutAnswer');


});


