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

Route::name('project.')->group(function(){
    Route::get('/projects', 'ProjectController@index')->name('index');
    Route::get('/project/{project}', 'ProjectController@show')->name('show');
    Route::post('/project', 'ProjectController@store')->name('store');
    Route::put('/project/{project}', 'ProjectController@update')->name('update');
    Route::delete('/project/{project}', 'ProjectController@destroy')->name('delete');
    Route::patch('/project/{project}/completed', 'ProjectController@completed')->name('completed');

});
/*
Route::prefix('resource.')->group(function(){
    Route::get('/resources', 'ResourceController@index')->name('index');
    Route::get('/resource/{resource}', 'ResourceController@show')->name('show');
    Route::post('/resource', 'ResourceController@store')->name('store');
    Route::put('/resource/{resource}', 'ResourceController@update')->name('update');
    Route::delete('/resource/{resource}', 'ResourceController@destroy')->name('delete');
    
});


Route::prefix('lessonLearned.')->group(function(){
    Route::get('/lessonsLearned', 'LessonLearnedController@index')->name('index');
    Route::get('/lessonLearned/{lessonLearned}', 'LessonLearnedController@show')->name('show');
    Route::post('/lessonLearned', 'LessonLearnedController@store')->name('store');
    Route::put('/lessonLearned/{lessonLearned}', 'LessonLearnedController@update')->name('update');
    Route::delete('/lessonLearned/{lessonLearned}', 'LessonLearnedController@destroy')->name('delete');
    
});
    Route::prefix('acta.')->group(function(){
    Route::get('/actas', 'ActaController@index')->name('index');
    Route::get('/acta/{acta}', 'ActaController@show')->name('show');
    Route::post('/acta', 'ActaController@store')->name('store');
    Route::put('/acta/{acta}', 'ActaController@update')->name('update');
    Route::delete('/acta/{acta}', 'ActaController@destroy')->name('delete');
});

Route::prefix('actaConstitucion.')->group(function(){
    Route::get('/actaConstitucion', 'ActaConstitucionController@index')->name('index');
    Route::get('/actaConstitucion/{actaConstitucion}', 'ActaConstitucionController@show')->name('show');
    Route::post('/actaConstitucion', 'ActaConstitucionController@store')->name('store');
    Route::put('/actaConstitucion/{actaConstitucion}', 'ActaConstitucionController@update')->name('update');
    Route::delete('/actaConstitucion/{actaConstitucion}', 'ActaConstitucionController@destroy')->name('delete');
});

Route::prefix('actaConfiguracion.')->group(function(){
    Route::get('/actaConfiguraciones', 'ActaConfiguracionController@index')->name('index');
    Route::get('/actaConfiguracion/{acta}', 'ActaConfiguracionController@show')->name('show');
    Route::post('/actaConfiguracion', 'ActaConfiguracionController@store')->name('store');
    Route::put('/actaConfiguracion/{actaConfiguracion}', 'ActaConfiguracionController@update')->name('update');
    Route::delete('/actaConfiguracion/{actaConfiguracion}', 'ActaConfiguracionController@destroy')->name('delete');
});

Route::prefix('actaPlanDirector.')->group(function(){
    Route::get('/actaPlanDirector', 'ActaPlanDirectorController@index')->name('index');
    Route::get('/actaPlanDirector/{acta}', 'ActaPlanDirectorController@show')->name('show');
    Route::post('/actaPlanDirector', 'ActaPlanDirectorController@store')->name('store');
    Route::put('/actaPlanDirector/{actaPlanDirector}', 'ActaPlanDirectorController@update')->name('update');
    Route::delete('/actaPlanDirector/{actaPlanDirector}', 'ActaPlanDirectorController@destroy')->name('delete');
});

Route::prefix('actaRiesgo.')->group(function(){
    Route::get('/actaRiesgos', 'ActaRiesgoController@index')->name('index');
    Route::get('/actaRiesgo/{actaRiesgo}', 'ActaRiesgoController@show')->name('show');
    Route::post('/actaRiesgo', 'ActaRiesgoController@store')->name('store');
    Route::put('/actaRiesgo/{actaRiesgo}', 'ActaRiesgoController@update')->name('update');
    Route::delete('/actaRiesgo/{actaRiesgo}', 'ActaRiesgoController@destroy')->name('delete');
});

Route::prefix('change.')->group(function(){
    Route::get('/', 'ChangeController@index')->name('index');
    Route::get('/{change}', 'ChangeController@show')->name('show');
    Route::post('/', 'ChangeController@store')->name('store');
    Route::put('/{change}', 'ChangeController@update')->name('update');
    Route::delete('/{change}', 'ChangeController@destroy')->name('delete');
});
Route::prefix('project_team.')->group(function(){
    Route::get('/project_team', 'ProjectTeamController@index')->name('index');
    Route::get('/project_team/{project_team}', 'ProjectTeamController@show')->name('show');
    Route::post('/project_team', 'ProjectTeamController@store')->name('store');
    Route::put('/project_team/{project_team}', 'ProjectTeamController@update')->name('update');
    Route::delete('/project_team/{project_team}', 'ProjectTeamController@destroy')->name('delete');
});
Route::prefix('people.')->group(function(){
    Route::get('/people', 'PeopleController@index')->name('index');
    Route::get('/people/{people}', 'PeopleController@show')->name('show');
    Route::post('/people', 'ProjectTeamController@store')->name('store');
    Route::put('/people/{people}', 'PeopleController@update')->name('update');
    Route::delete('/people/{people}', 'PeopleController@destroy')->name('delete');
});
Route::prefix('provider.')->group(function(){
    Route::get('/providers', 'ProviderController@index')->name('index');
    Route::get('/provider/{provider}', 'ProviderController@show')->name('show');
    Route::post('/provider', 'ProviderController@store')->name('store');
    Route::put('/provider/{provider}', 'ProviderController@update')->name('update');
    Route::delete('/provider/{provider}', 'ProviderController@destroy')->name('delete');
});
Route::prefix('agreement.')->group(function(){
    Route::get('/agreements', 'AgreementController@index')->name('index');
    Route::get('/agreement/{agreement}', 'AgreementController@show')->name('show');
    Route::post('/agreement', 'ProjectTeamController@store')->name('store');
    Route::put('/agreement/{agreement}', 'AgreementController@update')->name('update');
    Route::delete('/agreement/{agreement}', 'AgreementController@destroy')->name('delete');
});


Route::prefix('activities.')->group(function(){
    Route::get('/activities', 'ActivitiesController@index')->name('index');
    Route::get('/activities/{activities}', 'ActivitiesController@show')->name('show');
    Route::post('/activities/', 'ActivitiesController@store')->name('store');
    Route::put('/activities/{activities}', 'ActivitiesController@update')->name('update');
    Route::delete('/activities/{activities}', 'ActivitiesController@destroy')->name('delete');
    Route::patch('project_team/{project_team}/activities/{activities}/completed', 'ActivitiesController@completed')->name('completed');

});

Route::prefix('planProject.')->group(function(){
    Route::get('/planProject', 'PlanProjectController@index')->name('index');
    Route::get('/planProject/{planProject}', 'PlanProjectController@show')->name('show');
    Route::post('/planProject', 'PlanProjectController@store')->name('store');
    Route::put('/planProject/{planProject}', 'PlanProjectController@update')->name('update');
    Route::delete('/planProject/{planProject}', 'PlanProjectController@destroy')->name('delete');
    Route::patch('project_team/{project_team}/planProject/{planProject}/completed', 'PlanProjectController@completed')->name('completed');

});

Route::prefix('acquisition.')->group(function(){
    Route::get('/acquisition', 'AcquisitionController@index')->name('index');
    Route::get('/acquisition/{acquisition}', 'AcquisitionController@show')->name('show');
    Route::post('/acquisition', 'AcquisitionController@store')->name('store');
    Route::put('/acquisition/{acquisition}', 'AcquisitionController@update')->name('update');
    Route::delete('/acquisition/{acquisition}', 'AcquisitionController@destroy')->name('delete');
   

});
*/