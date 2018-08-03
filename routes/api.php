<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('project')->name('project.')->group(function(){
    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('/{project}', 'ProjectController@show')->name('show');
    Route::post('/', 'ProjectController@store')->name('store');
    Route::put('/{project}', 'ProjectController@update')->name('update');
    Route::delete('/{project}', 'ProjectController@destroy')->name('delete');
  /*  
    Route::post('/{project}/acta', 'ProjectController@acta')->name('acta');
    Route::post('/{project}/acta/riesgo', 'ProjectController@actaRiesgo')->name('acta');
    Route::post('/{project}/acta/cambio', 'ProjectController@actaCambio')->name('acta');
    Route::post('/{project}/acta/configuracio', 'ProjectController@actaConfig')->name('acta');
    */
});
Route::prefix('resource')->group(function(){
    Route::get('/', 'ResourceController@index')->name('index');
    Route::get('/{resource}', 'ResourceController@show')->name('show');
    Route::post('/', 'ResourceController@store')->name('store');
    Route::put('/{resource}', 'ResourceController@update')->name('update');
    Route::delete('/{resource}', 'ResourceController@destroy')->name('delete');
    
});
Route::prefix('lessonLearned')->group(function(){
    Route::get('/', 'LessonLearnedController@index')->name('index');
    Route::get('/{lessonLearned}', 'LessonLearnedController@show')->name('show');
    Route::post('/', 'LessonLearnedController@store')->name('store');
    Route::put('/{lessonLearned}', 'LessonLearnedController@update')->name('update');
    Route::delete('/{lessonLearned}', 'LessonLearnedController@destroy')->name('delete');
    
});
    Route::prefix('acta')->group(function(){
    Route::get('/', 'ActaController@index')->name('index');
    Route::get('/{acta}', 'ActaController@show')->name('show');
    Route::post('/', 'ActaController@store')->name('store');
    Route::put('/{acta}', 'ActaController@update')->name('update');
    Route::delete('/{acta}', 'ActaController@destroy')->name('delete');
});

Route::prefix('actaConstitucion')->group(function(){
    Route::get('/', 'ActaConstitucionController@index')->name('index');
    Route::get('/{actaConstitucion}', 'ActaConstitucionController@show')->name('show');
    Route::post('/', 'ActaConstitucionController@store')->name('store');
    Route::put('/{actaConstitucion}', 'ActaConstitucionController@update')->name('update');
    Route::delete('/{actaConstitucion}', 'ActaConstitucionController@destroy')->name('delete');
});

Route::prefix('actaConfiguracion')->group(function(){
    Route::get('/', 'ActaConfiguracionController@index')->name('index');
    Route::get('/{acta}', 'ActaConfiguracionController@show')->name('show');
    Route::post('/', 'ActaConfiguracionController@store')->name('store');
    Route::put('/{actaConfiguracion}', 'ActaConfiguracionController@update')->name('update');
    Route::delete('/{actaConfiguracion}', 'ActaConfiguracionController@destroy')->name('delete');
});

Route::prefix('actaPlanDirector')->group(function(){
    Route::get('/', 'ActaPlanDirectorController@index')->name('index');
    Route::get('/{acta}', 'ActaPlanDirectorController@show')->name('show');
    Route::post('/', 'ActaPlanDirectorController@store')->name('store');
    Route::put('/{actaPlanDirector}', 'ActaPlanDirectorController@update')->name('update');
    Route::delete('/{actaPlanDirector}', 'ActaPlanDirectorController@destroy')->name('delete');
});

Route::prefix('actaRiesgo')->group(function(){
    Route::get('/', 'ActaRiesgoController@index')->name('index');
    Route::get('/{acta}', 'ActaRiesgoController@show')->name('show');
    Route::post('/', 'ActaRiesgoController@store')->name('store');
    Route::put('/{actaRiesgo}', 'ActaRiesgoController@update')->name('update');
    Route::delete('/{actaRiesgo}', 'ActaRiesgoController@destroy')->name('delete');
});

Route::prefix('change')->group(function(){
    Route::get('/', 'ChangeController@index')->name('index');
    Route::get('/{change}', 'ChangeController@show')->name('show');
    Route::post('/', 'ChangeController@store')->name('store');
    Route::put('/{change}', 'ChangeController@update')->name('update');
    Route::delete('/{change}', 'ChangeController@destroy')->name('delete');
});
Route::prefix('project_team')->group(function(){
    Route::get('/', 'ProjectTeamController@index')->name('index');
    Route::get('/{project_team}', 'ProjectTeamController@show')->name('show');
    Route::post('/', 'ProjectTeamController@store')->name('store');
    Route::put('/{project_team}', 'ProjectTeamController@update')->name('update');
    Route::delete('/{project_team}', 'ProjectTeamController@destroy')->name('delete');
});
Route::prefix('people')->group(function(){
    Route::get('/', 'PeopleController@index')->name('index');
    Route::get('/{people}', 'PeopleController@show')->name('show');
    Route::post('/', 'ProjectTeamController@store')->name('store');
    Route::put('/{people}', 'PeopleController@update')->name('update');
    Route::delete('/{people}', 'PeopleController@destroy')->name('delete');
});
Route::prefix('provider')->group(function(){
    Route::get('/', 'ProviderController@index')->name('index');
    Route::get('/{provider}', 'ProviderController@show')->name('show');
    Route::post('/', 'ProviderController@store')->name('store');
    Route::put('/{provider}', 'ProviderController@update')->name('update');
    Route::delete('/{provider}', 'ProviderController@destroy')->name('delete');
});
Route::prefix('agreement')->group(function(){
    Route::get('/', 'AgreementController@index')->name('index');
    Route::get('/{agreement}', 'AgreementController@show')->name('show');
    Route::post('/', 'ProjectTeamController@store')->name('store');
    Route::put('/{agreement}', 'AgreementController@update')->name('update');
    Route::delete('/{agreement}', 'AgreementController@destroy')->name('delete');
});