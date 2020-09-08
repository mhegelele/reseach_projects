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

Route::get('/', 'ProjectController@loadHome')->name('home');
Route::get("/logout","Auth\LoginController@logout");

Auth::routes();

Route::get('/home', 'HomeController@loadHome')->name('home');
//Add project
Route::get("/add-project","ProjectController@addprojects");
Route::post("/add-project","ProjectController@addproject");
//View project
Route::get("/uploaded-project", "ProjectController@viewproject");
Route::get("/uploaded", "ProjectController@viewadminproject");
Route::get("/uploaded-project/progress_project", "ProjectController@viewpendingproject");
Route::get("/uploaded-project/progress_project", "ProjectController@viewpendingprojects");

Route::get("/view-project","ProjectController@viewoneproject");

//user
Route::get("/home/projects/{id}","ProjectController@viewhomeProjectbyid");
//VIEW BY IDS
Route::get("/uploaded-project/projects/{id}","ProjectController@viewProjectbyid");
//investigator
Route::get("/uploaded-project/investigators/{id}","ProjectController@viewInvestigator");

//Institiution
Route::get("/uploaded-project/institution/{id}","ProjectController@viewInstitution");
Route::post("/institutions","ProjectController@updateinstitution");
Route::post("/delete-institution","ProjectController@deleteinstitution");
Route::get("/deleteinstitution/{id}","ProjectController@deleteInstitution");
//Publication
Route::get("/uploaded-project/publication/{id}","ProjectController@viewPublication");
Route::post("/publications","ProjectController@updatepublication");
Route::post("/delete-publication","ProjectController@deletepublication");
Route::get("/deletepublication/{id}","ProjectController@deletePublication");

//Sponsor
Route::get("/uploaded-project/sponsor/{id}","ProjectController@viewSponsor");
Route::post("/sponsors","ProjectController@updatesponsor");
Route::post("/delete-sponsor","ProjectController@deletesponsor");
Route::get("/deletesponsor/{s_id}","ProjectController@deleteSponsor");

//Objective
Route::get("/uploaded-project/objective/{id}","ProjectController@viewObjective");
Route::post("/objectives","ProjectController@updateobjective");
Route::post("/delete-objective","ProjectController@deleteobjective");
Route::get("/deleteobjective/{o_id}","ProjectController@deleteObjective");


Route::post("investigators","ProjectController@editInvestigator");
Route::post("/delete-investigator","ProjectController@deleteinvestigator");

//PROGRESS
Route::get("/uploaded-project/progress/{id}","ProjectController@viewProgress"); 
Route::get("/uploaded-project/project/{id}","ProjectController@viewProjectsbyid");
Route::post("/uploaded-project","ProjectController@updateproject");
Route::post("/progresses","ProjectController@updateprogress");
Route::get("/deleteprogress/{q_id}","ProjectController@deleteProgress");
Route::post("/approve-project","ProjectController@approveproject");
Route::post("/delete-project","ProjectController@deleteproject");


Route::get("/home/centre/{centre}","ProjectController@viewProjectsbycentre");



//Admin
//view by id approved projects
Route::get("/manage/projects","ProjectController@manageProject");
Route::get("/manage/projects/{id}","ProjectController@viewProjectbyid");
//view all approve project
Route::get("/manage","ProjectController@manageProject");
Route::get("/manage/project/{id}","ProjectController@viewadminProjectsbyid");
Route::get("/manage/progress", "ProjectController@viewadminpendingproject");



Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

Route::get('/pagination', 'PaginationController@index');

Route::get('/pagination/fetch_data', 'PaginationController@fetch_data');


Route::post("/publicationlist_datatable","HomeController@dataTableList");
Route::get("/ajax/{malaria}","AjaxController@index");

Route::get('/home/search','HomeController@search');
Route::post('/home/search','HomeController@search');

//Users
Route::get('/manage/users','UserController@index');
Route::get('/manage/deleteuser/{id}','UserController@deleteUser');
Route::get('/manage/useredit/{id}','UserController@edituser');
Route::post("/manage/updateuser","UserController@updateuser");
Route::post("/manage/user","UserController@userRegistration");

Route::get("/manage/report","ReportController@index");
Route::get('/manage/reportbycentre/{id}','ReportController@viewbycentre');
Route::get('pdfviews',array('as'=>'pdfviews','uses'=>'ReportController@pdfgenerate'));
Route::get('/manage/centrePDF/{id}', 'ReportController@centrePDF');