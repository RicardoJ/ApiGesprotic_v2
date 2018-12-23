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
//probado
Route::prefix('project')->group(function(){
    Route::get('/', 'ProjectController@index')->name('index');
    Route::post('/project', 'ProjectController@store')->name('store');
    Route::get('/{project}', 'ProjectController@show')->name('show');
    Route::put('/{project}', 'ProjectController@update')->name('update');
    Route::delete('/{project}', 'ProjectController@destroy')->name('delete');
    Route::put('/project/{project}/completed', 'ProjectController@completed')->name('completed');

});
/*
// probado
Route::prefix('resource')->group(function(){
    Route::get('/', 'ResourceController@index')->name('index');
    Route::get('/{resource}', 'ResourceController@show')->name('show');
    Route::post('/project/{project}', 'ResourceController@store')->name('store');
    Route::post('/provider/{provider}', 'ResourceController@storeWithProvider')->name('storeWithProvider');
    Route::put('/{resource}/project/{project}', 'ResourceController@update')->name('update');
    Route::put('/{resource}/provider/{provider}', 'ResourceController@updateProvider')->name('updateProvider');
    Route::delete('/{resource}', 'ResourceController@destroy')->name('delete');
    Route::get('/project/{project}/resource', 'ResourceController@listarRecursoPorProyecto')->name('listarRecursoPorProyecto');
    Route::get('/provider/{provider}/resource', 'ResourceController@listarRecursoPorProveedor')->name('listarRecursoPorProveedor');
});


//probado
Route::prefix('lessonLearned')->group(function(){
    Route::get('/', 'LessonLearnedController@index')->name('index');
    Route::get('/{lessonLearned}', 'LessonLearnedController@show')->name('show');
    Route::post('/{project}', 'LessonLearnedController@store')->name('store');
    Route::put('/{lessonLearned}', 'LessonLearnedController@update')->name('update');
    Route::delete('/{lessonLearned}', 'LessonLearnedController@destroy')->name('delete');
    Route::get('/project/{project}/lessonLearned', 'LessonLearnedController@listaLeccionPorProyecto')->name('listaLeccionPorProyecto');
});

//probado
    Route::prefix('acta.')->group(function(){
    Route::get('/actas', 'ActaController@index')->name('index');
    Route::get('/acta/{acta}', 'ActaController@show')->name('show');
    Route::post('/acta', 'ActaController@store')->name('store');
    Route::put('/acta/{acta}', 'ActaController@update')->name('update');
    Route::delete('/acta/{acta}', 'ActaController@destroy')->name('delete');
});

//probado
Route::prefix('actaConstitucion')->group(function(){
    Route::get('/', 'ActaConstitucionController@index')->name('index');
    Route::get('/{actaConstitucion}', 'ActaConstitucionController@show')->name('show');
    Route::post('/{project}', 'ActaConstitucionController@store')->name('store');
    Route::put('/{actaConstitucion}', 'ActaConstitucionController@update')->name('update');
    Route::delete('/{actaConstitucion}', 'ActaConstitucionController@destroy')->name('delete');
    Route::get('/project/{project}/actaConstitucion', 'ActaConstitucionController@listaActaConstitucionPorProyecto')->name('listaActaConstitucionPorProyecto');
});


// probado
Route::prefix('actaConfiguracion1')->group(function(){
    Route::get('/', 'ActaConfiguracion1Controller@index')->name('index');
    Route::get('/{actaConfiguracion1}', 'ActaConfiguracion1Controller@show')->name('show');
    Route::post('/{project}', 'ActaConfiguracion1Controller@store')->name('store');
    Route::put('/{actaConfiguracion1}', 'ActaConfiguracion1Controller@update')->name('update');
    Route::delete('/{actaConfiguracion1}', 'ActaConfiguracion1Controller@destroy')->name('delete');
    Route::get('/project/{project}/actaConfiguracion', 'ActaConfiguracion1Controller@listaActaConfiguracionPorProyecto')->name('listaActaConfiguracionPorProyecto');
    
});

//probado
Route::prefix('actaConfiguracion2')->group(function(){
    Route::get('/', 'ActaConfiguracion2Controller@index')->name('index');
    Route::get('/{actaConfiguracion2}', 'ActaConfiguracion2Controller@show')->name('show');
    Route::post('/{project}', 'ActaConfiguracion2Controller@store')->name('store');
    Route::put('/{actaConfiguracion2}', 'ActaConfiguracion2Controller@update')->name('update');
    Route::delete('/{actaConfiguracion2}', 'ActaConfiguracion2Controller@destroy')->name('delete');
    Route::get('/project/{project}/actaConfiguracion2', 'ActaConfiguracion2Controller@listaActaConfiguracionPorProyecto')->name('listaActaConfiguracionPorProyecto');
    
}); 



// probado
Route::prefix('actaPlanDirector')->group(function(){
    Route::get('/', 'ActaPlanDirectorController@index')->name('index');
    Route::get('/{actaPlanDirector}', 'ActaPlanDirectorController@show')->name('show');
    Route::post('/{project}', 'ActaPlanDirectorController@store')->name('store');
    Route::put('/{actaPlanDirector}', 'ActaPlanDirectorController@update')->name('update');
    Route::delete('/{actaPlanDirector}', 'ActaPlanDirectorController@destroy')->name('delete');
   
});

// probado
Route::prefix('actaRiesgo')->group(function(){
    Route::get('/', 'ActaRiesgoController@index')->name('index');
    Route::get('/{actaRiesgo}', 'ActaRiesgoController@show')->name('show');
    Route::post('/{project}', 'ActaRiesgoController@store')->name('store');
    Route::put('/{actaRiesgo}', 'ActaRiesgoController@update')->name('update');
    Route::delete('/{actaRiesgo}', 'ActaRiesgoController@destroy')->name('delete');
    Route::get('/project/{project}/actaRiesgo', 'ActaRiesgoController@listaActaRiesgoPorProyecto')->name('listaActaRiesgoPorProyecto');
});

//probado
Route::prefix('change')->group(function(){
    Route::get('/', 'ChangeController@index')->name('index');
    Route::get('/{change}', 'ChangeController@show')->name('show');
    Route::post('/{project}', 'ChangeController@store')->name('store');
    Route::put('/{change}', 'ChangeController@update')->name('update');
    Route::delete('/{change}', 'ChangeController@destroy')->name('delete');
});

// probado
Route::prefix('project_team')->group(function(){
    Route::get('/', 'ProjectTeamController@index')->name('index');
    Route::get('/{project_team}', 'ProjectTeamController@show')->name('show');
    Route::post('/{project}', 'ProjectTeamController@store')->name('store');
    Route::put('Name/{project_team}', 'ProjectTeamController@updateName')->name('updateName');
    Route::post('Image/{project_team}', 'ProjectTeamController@updateImage')->name('updateImage');
    Route::delete('/{project_team}', 'ProjectTeamController@destroy')->name('delete');
    Route::get('/project/{project}/project_team', 'ProjectTeamController@listaProjectTeamPorProyecto')->name('listaProjectTeamPorProyecto');
});

// probado
Route::prefix('people')->group(function(){
    Route::get('/', 'PeopleController@index')->name('index');
    Route::get('/{people}', 'PeopleController@show')->name('show');
    Route::post('/{project_team}', 'PeopleController@store')->name('store');
    Route::put('/{people}', 'PeopleController@update')->name('update');
    Route::delete('/{people}', 'PeopleController@destroy')->name('delete');
    Route::get('/project_team/{project_team}/people', 'PeopleController@listarPersonasDeEquipo')->name('listarPersonasDeEquipo');
});
 
// probado
Route::prefix('provider')->group(function(){
    Route::get('/', 'ProviderController@index')->name('index');
    Route::get('/{provider}', 'ProviderController@show')->name('show');
    Route::post('/', 'ProviderController@store')->name('store');
    Route::put('/{provider}', 'ProviderController@update')->name('update');
    Route::delete('/{provider}', 'ProviderController@destroy')->name('delete');
});

// probado
Route::prefix('agreement')->group(function(){
    Route::get('/', 'AgreementController@index')->name('index');
    Route::get('/{agreement}', 'AgreementController@show')->name('show');
    Route::post('/{provider}', 'AgreementController@store')->name('store');
    Route::put('/{agreement}', 'AgreementController@update')->name('update');
    Route::delete('/{agreement}', 'AgreementController@destroy')->name('delete');
    Route::get('/provider/{provider}/agreement', 'AgreementController@listaContratoPorProveedor')->name('listaContratoPorProveedor');
});

// probado
Route::prefix('activitie')->group(function(){
    Route::get('/', 'ActivitiesController@index')->name('index');
    Route::get('/{activities}', 'ActivitiesController@show')->name('show');
    Route::post('/{project_team}', 'ActivitiesController@store')->name('store');
    Route::put('/{activities}', 'ActivitiesController@update')->name('update');
    Route::delete('/{activities}', 'ActivitiesController@destroy')->name('delete');
    Route::get('/project_team/{project_team}/activitie', 'ActivitiesController@listarActividadporProyecto')->name('listarActividadporProyecto');
    Route::patch('project_team/{project_team}/activitie/{activities}/completed', 'ActivitiesController@completed')->name('completed');

});




  //  probado
Route::prefix('acquisition')->group(function(){
    Route::get('/', 'AcquisitionController@index')->name('index');
    Route::get('/{acquisition}', 'AcquisitionController@show')->name('show');
    Route::post('/', 'AcquisitionController@store')->name('store');
    Route::put('/{acquisition}', 'AcquisitionController@update')->name('update');
    Route::delete('/{acquisition}', 'AcquisitionController@destroy')->name('delete');
});

//probado
Route::prefix('projectOrganization')->group(function(){
    Route::get('/', 'ProjectOrganizationController@index')->name('index');
    Route::get('/{projectOrganization}', 'ProjectOrganizationController@show')->name('show');
    Route::post('/{project}', 'ProjectOrganizationController@store')->name('store');
    Route::put('/{projectOrganization}', 'ProjectOrganizationController@update')->name('update');
    Route::delete('/{projectOrganization}', 'ProjectOrganizationController@destroy')->name('delete');
});

//  probado
Route::prefix('teamDevelopment')->group(function(){
    Route::get('/', 'TeamDevelopmentController@index')->name('index');
    Route::get('/{teamDevelopment}', 'TeamDevelopmentController@show')->name('show');
    Route::post('/{project_team}', 'TeamDevelopmentController@store')->name('store');
    Route::put('/{teamDevelopment}', 'TeamDevelopmentController@update')->name('update');
    Route::delete('/{teamDevelopment}', 'TeamDevelopmentController@destroy')->name('delete');
    Route::get('/project_team/{project_team}/teamDevelopment', 'TeamDevelopmentController@listarTeamDev')->name('listarTeamDev');
   
    
});

// probado
Route::prefix('teamManagement')->group(function(){
    Route::get('/', 'TeamManagementController@index')->name('index');
    Route::get('/{teamManagement}', 'TeamManagementController@show')->name('show');
    Route::post('/{project_team}', 'TeamManagementController@store')->name('store');
    Route::put('/{teamManagement}', 'TeamManagementController@update')->name('update');
    Route::delete('/{teamManagement}', 'TeamManagementController@destroy')->name('delete');
    Route::get('/project_team/{project_team}/teamManagement', 'TeamManagementController@listarTeamMan')->name('listarTeamMan');
});
*/