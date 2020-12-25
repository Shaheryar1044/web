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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();
Route::group(['middleware' => ['auth', 'user']], function(){

	Route::get('dashboard','FrontEndController@index')->name('dashboard');

});

Route::group(['middleware' => ['auth', 'admin'], 'prefix'=> 'admin'], function(){
	Route::get('/dashboard', 'Admin\AdminController@index')->name('adminDashboard');
	Route::get('/templates', 'Admin\TemplateController@index')->name('templates');
	Route::get('/template/create', 'Admin\TemplateController@create')->name('createTemplate');
	Route::post('/template/save', 'Admin\TemplateController@store')->name('storeTemplate');
	Route::get('/template/edit/{id}', 'Admin\TemplateController@editTemplate')->name('editTemplate');
	Route::post('/template/update/{id}', 'Admin\TemplateController@updateTemplate')->name('updateTemplate');
	Route::get('/template/delete/{id}', 'Admin\TemplateController@deleteTemplate')->name('deleteTemplate');
	Route::get('/template/editions', 'Admin\TemplateEditionController@index')->name('templateEditions');
	Route::get('/template/edition/create', 'Admin\TemplateEditionController@create')->name('createTemplateEdition');
	Route::post('/template/edition/save', 'Admin\TemplateEditionController@store')->name('storeTemplateEdition');
	Route::get('/template/edition/edit/{id}', 'Admin\TemplateEditionController@editTemplateEdition')->name('editTemplateEdition');
	Route::post('/template/edition/update/{id}', 'Admin\TemplateEditionController@updateTemplateEdition')->name('updateTemplateEdition');
	Route::get('/template/edition/delete/{id}', 'Admin\TemplateEditionController@deleteTemplateEdition')->name('deleteTemplateEdition');
	Route::get('/challenges', 'Admin\ChallengeController@index')->name('challenges');
	Route::get('/challenge/create', 'Admin\ChallengeController@create')->name('createChallenge');
	Route::get('/challenge/edit/{id}', 'Admin\ChallengeController@challengeEdit')->name('challengeEdit');
	Route::post('/challenge/update/{id}', 'Admin\ChallengeController@challengeUpdate')->name('challengeUpdate');
	Route::get('/challenge/delete/{id}', 'Admin\ChallengeController@challengeDelete')->name('challengeDelete');
	Route::post('/challenge/save', 'Admin\ChallengeController@store')->name('storeChallenge');
	Route::get('/duplicate/challenge/{id}', 'Admin\ChallengeController@duplicateChallange')->name('duplicateChallange');
	Route::get('/adventures', 'Admin\AdventureController@index')->name('adventures');
	Route::get('/adventure/create', 'Admin\AdventureController@create')->name('createAdventure');
	Route::post('/adventure/save', 'Admin\AdventureController@store')->name('storeAdventure');
	Route::get('/duplicate/adventure/{id}', 'Admin\AdventureController@duplicateAdventure')->name('duplicateAdventure');
	Route::get('/adventure/delete/{id}', 'Admin\AdventureController@deleteAdventure')->name('deleteAdventure');
	Route::get('/adventure/edit/{id}', 'Admin\AdventureController@editAdventure')->name('editAdventure');
	Route::post('/adventure/update/{id}', 'Admin\AdventureController@updateAdventure')->name('updateAdventure');
	Route::get('/final/template', 'Admin\TemplateController@finalEditions')->name('finalEditions');
	Route::post('save/final/template', 'Admin\TemplateController@storefinalTemplate')->name('storefinalTemplate');
	Route::get('/final/templates/list', 'Admin\TemplateController@indexfinalTemplate')->name('indexfinalTemplate');
	Route::get('/edit/final/template/{id}', 'Admin\TemplateController@editfinalTemplate')->name('editfinalTemplate');
	Route::post('/update/final/template/{id}', 'Admin\TemplateController@updatefinalTemplate')->name('updatefinalTemplate');
	Route::get('/delete/final/template/{id}', 'Admin\TemplateController@deletefinalTemplate')->name('deletefinalTemplate');
});


Route::get('lang/{locale}','HomeController@langg')->name('setLocale');

Route::group(['middleware' => ['lang','auth', 'user']], function (){
	Route::get('main','FrontEndController@index')->name('dashboard');
	Route::get('game-start/{code}/{groupId?}','FrontEndController@templateEdition')->name('templateEdition');
	Route::get('choose-person/{code}','FrontEndController@choosePerson')->name('choosePerson');
	Route::get('start-now/{code}/{id?}','FrontEndController@startNow')->name('startNow');
	Route::get('loader-page','FrontEndController@loaderNow')->name('loaderPage');
	Route::get('congrats-page/{code}/{id?}','FrontEndController@congratsPage')->name('congratsPage');
	Route::get('check-event-id/{code}','FrontEndController@checkCodeMatch')->name('checkCodeMatch');
	Route::get('/get/challanges/{code}','FrontEndController@challanges')->name('challanges');
	Route::post('/save-data','FrontEndController@saveData')->name('saveData');
	Route::get('joinevent/{code}/{group}','FrontEndController@joinEvent')->name('startNow');
	Route::get('final-score/{code}/{group}','FrontEndController@score');
	Route::post('count-hint','FrontEndController@countHint')->name('countHint');
});
