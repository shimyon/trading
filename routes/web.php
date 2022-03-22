<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Config\ConfigurationController;

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
    return view('welcome');
});
// login and registration
Route::get('/customauth/usersRegistration', [CustomAuthController::class, 'usersRegistraton']);
Route::get('/customauth/ViewDesk', [CustomAuthController::class, 'ViewDesk']);
// configuration
Route::get('/config/configList', [ConfigurationController::class, 'configList']);
Route::get('/config/configFormAdd', [ConfigurationController::class, 'configFormAdd']);
Route::post('/config/configFormStore', [ConfigurationController::class, 'configFormStore']);
Route::get('/config/editconfig/{id}', [ConfigurationController::class, 'editconfig']);
Route::post('/config/configFormupdate/{configurations}', [ConfigurationController::class, 'configFormupdate']);
Route::post('/config/deleteConfig/{id}', [ConfigurationController::class, 'deleteConfig']);

