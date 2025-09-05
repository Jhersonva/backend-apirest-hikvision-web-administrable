<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SocialNetwork\SocialNetworkController;
use App\Http\Controllers\Api\ContactInformationCompany\ContactInformationCompanyController;
use App\Http\Controllers\Api\AuthUsers\AuthUserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUserAuth;

Route::prefix('admin')->group(function () {
    // Rutas públicas
    Route::post('register', [AuthUserController::class, 'registerUser']);
    Route::post('login', [AuthUserController::class, 'loginUser']);

    // Rutas protegidas (requieren autenticación)
    Route::middleware(IsUserAuth::class)->group(function () {
        Route::post('refresh-token', [AuthUserController::class, 'refreshToken']);
        Route::post('logout', [AuthUserController::class, 'logout']);
        Route::get('user', [AuthUserController::class, 'getUser']);

        // Solo Admins
        Route::middleware(IsAdmin::class)->group(function () {

            //ContactInformationCompany
            Route::get('contact-information-company', [ContactInformationCompanyController::class, 'index']);
            Route::post('contact-information-company', [ContactInformationCompanyController::class, 'update']);

            //SocialNetwork
            Route::get('social-networks', [SocialNetworkController::class, 'index']);
            Route::post('social-networks', [SocialNetworkController::class, 'store']);
            Route::put('social-networks/{id}', [SocialNetworkController::class, 'update']);
            Route::delete('social-networks/{id}', [SocialNetworkController::class, 'destroy']);
        });
    });
});
