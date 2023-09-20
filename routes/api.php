<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\CompanyController;
use App\Http\Controllers\Api\Admin\CommentController;
use App\Http\Controllers\Api\Front\CompanyController as FrontCompanyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//CRUD
Route::apiResource('users', UserController::class);
Route::apiResource('companies', CompanyController::class);
Route::apiResource('comments', CommentController::class);
//FRONT
Route::get('companies/{company_id}/comments', [FrontCompanyController::class, 'comments']);
Route::get('companies/{company_id}/rate', [FrontCompanyController::class, 'rate']);
Route::get('top', [FrontCompanyController::class, 'top']);


