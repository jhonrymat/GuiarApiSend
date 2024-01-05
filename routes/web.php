<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaypalPlanController;
use App\Http\Controllers\WebhooksPaypalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Agrega cualquier otra ruta relacionada con la suscripción aquí
    Route::get('/suscripcion', [PlanController::class, 'suscripcion'])->name('suscripcion');
    //revisar suscripcion
    Route::post('/paypal/suscripcion', [PlanController::class, 'store'])->name('paypal.suscripcion');
    //cancelar suscripción
    Route::post('/paypal/suscripcion/cancelar', [PaypalPlanController::class, 'cancel'])->name('paypal.suscripcion.cancel');
    //ver suscripcion
    Route::get('/paypal/suscripcions/{suscripcionsId}', [PlanController::class, 'show']);
});
//webhook de paypal
Route::post('/paypal/webhooks', [WebhooksPaypalController::class, 'webhooksPaypal']);
// ver planes sin autenticacion
Route::get('/planes', [PlanController::class, 'index'])->name('planes.index');

Route::get('/auth/redirect', [AuthController::class,'redirect']);
Route::get('/auth/callback-url', [AuthController::class,'callback']);

// Route::get('/login-facebook', [AuthController::class,'redirectFacebook']);
// Route::get('/facebook-callback', [AuthController::class,'callbackFacebook']);

Route::get('paypal/products/create_product', [PaypalPlanController::class,'createProduct']);
Route::get('paypal/plan/create_monthly_plan', [PaypalPlanController::class,'createMonthlyPlan']);
Route::get('paypal/plan/create_yearly_plan', [PaypalPlanController::class,'createYearlyPlan']);
//verificar la creacion del plan
Route::get('/paypal/plans', [PaypalPlanController::class,'index']);
