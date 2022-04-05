<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Config\ConfigurationController;
use App\Http\Controllers\user\UsersController;

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
    return view('auth.login');
});
// login and registration
Route::get('/customauth/usersRegistration', [CustomAuthController::class, 'usersRegistraton']);
Route::post('/customauth/storeRegister', [CustomAuthController::class, 'storeRegister']);
Route::get('/customauth/ViewDesk', [CustomAuthController::class, 'ViewDesk']);
Route::get('/customauth/Dashboard', [CustomAuthController::class, 'Dashboard']);
Route::get('/customauth/usersLogin', [CustomAuthController::class, 'usersLogin']);
Route::post('/customauth/customLogin', [CustomAuthController::class, 'customLogin']);

// configuration
Route::get('/config/configList', [ConfigurationController::class, 'configList']);
Route::get('/config/configFormAdd', [ConfigurationController::class, 'configFormAdd']);
Route::post('/config/configFormStore', [ConfigurationController::class, 'configFormStore']);
Route::get('/config/editconfig/{id}', [ConfigurationController::class, 'editconfig']);
Route::post('/config/configFormupdate/{configurations}', [ConfigurationController::class, 'configFormupdate']);
Route::post('/config/deleteConfig/{id}', [ConfigurationController::class, 'deleteConfig']);

// users
Route::get('/user/userList', [UsersController::class, 'userList']);
Route::get('/user/userFormAdd', [UsersController::class, 'userFormAdd']);
Route::post('/user/userFormStore', [UsersController::class, 'userFormStore']);
Route::get('/user/edituser/{id}', [UsersController::class, 'edituser']);
Route::post('/user/userFormupdate/{users}', [UsersController::class, 'userFormupdate']);
Route::post('/user/deleteUser/{id}', [UsersController::class, 'deleteUser']);
Route::get('/user/editpassword/{id}', [UsersController::class, 'editpassword']);
Route::post('/user/password', [UsersController::class, 'password']);