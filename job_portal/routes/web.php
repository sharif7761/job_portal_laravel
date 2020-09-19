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
Route::get('/', 'LoginController@index');
 Route::post('/', 'LoginController@verify');

Route::get('/company', 'CompanyController@index')->name('company.index');
Route::get('/company_addJob', 'CompanyController@company_addJob');
Route::post('/company_addJob', 'CompanyController@company_addJobPost');
Route::get('/company_viewJob', 'CompanyController@company_viewJob');
Route::get('/company_viewApplicant', 'CompanyController@company_viewApplicant');


Route::get('/applicant', 'ApplicantController@index')->name('applicant.index');
Route::get('/applicant_viewJob', 'ApplicantController@applicant_viewJob');
Route::get('/applicant_apply/{job_id}', 'ApplicantController@applicant_apply');


Route::get('/applicant_profile', 'ProfileController@applicant_profile');
Route::post('/change_pic', 'ProfileController@change_pic'); 
Route::post('/add_skills', 'ProfileController@add_skills');
Route::post('/change_resume', 'ProfileController@change_resume'); 


Route::get('/signup', 'SignupController@index'); 
Route::post('/company_signup', 'SignupController@company_signup');
Route::post('/applicant_signup', 'SignupController@applicant_signup');


Route::get('/logout', 'logoutController@index');