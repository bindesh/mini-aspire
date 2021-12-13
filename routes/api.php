<?php


use App\Http\Controllers\API\RegisterController;
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

Route::post('register',[RegisterController::class, 'register']);
Route::post('login',[RegisterController::class, 'login']);


Route::middleware('auth:api')->prefix('user')->namespace('\App\Http\Controllers\API')->group(function($route){
    $route->get('/', function (Request $request) {
        return $request->user();
    });
});
Route::middleware('auth:api')->prefix('loans')->namespace('\App\Http\Controllers\API')->group(function($route){
    $route->get('/',  'LoanController@index');
    $route->get('/{id}',  'LoanController@show');
    $route->get('/accept/{id}',  'LoanController@acceptLoan');
    $route->post('/save-loan', 'LoanController@store');
    $route->put('/update-loan/{id}', 'LoanController@update');
     
});

Route::middleware('auth:api')->namespace('\App\Http\Controllers\API')->group(function($route){
    $route->post('repay/{loan}', 'RepaymentController@store');
});

