<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('get_broker', [ApiController::class, 'get_broker'])->name('get_broker');

Route::post('get_occupation', [ApiController::class, 'get_occupation'])->name('get_occupation');

Route::post('user_login', [ApiController::class, 'user_login'])->name('user_login');
Route::post('reset_password', [ApiController::class, 'reset_password'])->name('reset_password');
Route::post('set_password', [ApiController::class, 'set_password'])->name('set_password');
Route::post('get_projects', [ApiController::class, 'get_projects'])->name('get_projects');
Route::get('get_plots', [ApiController::class, 'get_plots'])->name('get_plots');
Route::post('get_plot_status', [ApiController::class, 'get_plot_status'])->name('get_plot_status');
Route::post('get_client', [ApiController::class, 'get_client'])->name('get_client');
Route::post('client_store', [ApiController::class, 'client_store'])->name('client_store');
Route::post('store_enquiry', [ApiController::class, 'store_enquiry'])->name('store_enquiry');
Route::post('get_enquiry_by_broker_id', [ApiController::class, 'get_enquiry_by_broker_id'])->name('get_enquiry_by_broker_id');
Route::post('get_enquiry_by_broker_and_date', [ApiController::class, 'get_enquiry_by_broker_and_date'])->name('get_enquiry_by_broker_and_date');
Route::post('update_enquiry', [ApiController::class, 'update_enquiry'])->name('update_enquiry');
Route::post('delete_enquiry', [ApiController::class, 'delete_enquiry'])->name('delete_enquiry');
Route::post('edit_enquiry', [ApiController::class, 'edit_enquiry'])->name('edit_enquiry');
