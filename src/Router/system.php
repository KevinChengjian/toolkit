<?php

use App\Http\Controllers\System\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\RoleController;
use App\Http\Controllers\System\PermissionController;

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

Route::get('permission/index', [PermissionController::class, 'index']);
Route::post('permission/store', [PermissionController::class, 'store']);
Route::post('permission/destroy', [PermissionController::class, 'destroy']);

Route::get('role/index', [RoleController::class, 'index']);
Route::post('role/store', [RoleController::class, 'store']);
Route::post('role/destroy', [RoleController::class, 'destroy']);

Route::get('user/index', [UserController::class, 'index']);
Route::post('user/store', [UserController::class, 'store']);
Route::post('user/destroy', [UserController::class, 'destroy']);
