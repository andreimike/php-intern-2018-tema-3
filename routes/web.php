<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Generate random 32 length key
$router->get('/key', function () {
    echo str_random(32);
});

// Routes for Company CRUD
$router->group(['prefix' => 'company'], function ($router) {

    // http://api.localhost/company
    $router->get('/', 'CompaniesController@showAllCompanies');

    // http://api.localhost/company/1
    $router->get('{id}', 'CompaniesController@getCompanyById');

    // http://api.localhost/company/type/IT
    $router->get('/type/{type}', 'CompaniesController@getCompanyByType');

    // http://api.localhost/create
    $router->post('create', 'CompaniesController@createCompany');

    // http://api.localhost/update/1
    $router->put('update/{id}', 'CompaniesController@updateCompany');

    // http://api.localhost/delete/1
    $router->delete('delete/{id}', 'CompaniesController@deleteCompany');

});

// Routes for Employee CRUD
$router->group(['prefix' => 'employee'], function ($router) {

    // http://api.localhost/employee
    $router->get('/', 'EmployeesController@showAllEmployees');

    // http://api.localhost/employee/1
    $router->get('{id}', 'EmployeesController@getEmployeeById');

    // http://api.localhost/employee/job/programmmer
    $router->get('/job/{job}', 'EmployeesController@getEmployeeByJob');

    // http://api.localhost/create
    $router->post('create', 'EmployeesController@createEmployee');

    // http://api.localhost/update/1
    $router->put('update/{id}', 'EmployeesController@updateEmployee');

    // http://api.localhost/delete/1
    $router->delete('delete/{id}', 'EmployeesController@deleteEmployee');

});

//$router->get('/companies', 'CompaniesController@showAllCompanies');
//$router->get('/companies/{id}', 'CompaniesController@getCompanyById');
//
//$router->get('/companies/types/{type}', 'CompaniesController@getCompanyByType');

//$router->get('/employees','EmployeesController@showAllEmployees');
//$router->get('/employees/{id}', 'EmployeesController@showEmployeeById');
//$router->get('/employees?job={job}', 'EmployeesController@showEmployeeByJob');