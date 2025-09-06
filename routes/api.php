<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Servics\ServiceController;
use App\Http\Controllers\Api\ServiceCategory\ServiceCategoryController;
use App\Http\Controllers\Api\VideoInformationAndSolution\VideoInformationAndSolutionController;
use App\Http\Controllers\Api\AboutUs\AboutUsController;
use App\Http\Controllers\Api\Feature\FeatureController;
use App\Http\Controllers\Api\Carousel\CarouselController;
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

            // Carrusel
            Route::get('carousels', [CarouselController::class, 'index']);
            Route::post('carousels', [CarouselController::class, 'store']);
            Route::put('carousels/{id}', [CarouselController::class, 'update']);
            Route::delete('carousels/{id}', [CarouselController::class, 'destroy']);
            
            // Features
            Route::get('features', [FeatureController::class, 'index']);
            Route::post('features', [FeatureController::class, 'store']);
            Route::put('features/{feature}', [FeatureController::class, 'update']);
            Route::delete('features/{feature}', [FeatureController::class, 'destroy']);

            // AboutUs
            Route::get('about-us', [AboutUsController::class, 'getInfo']);
            Route::put('about-us', [AboutUsController::class, 'update']);

            // list_about_us CRUD
            Route::get('about-us/list', [AboutUsController::class, 'listAll']);
            Route::post('about-us/list', [AboutUsController::class, 'add']);
            Route::put('about-us/list/{index}', [AboutUsController::class, 'updateList']);
            Route::delete('about-us/list/{index}', [AboutUsController::class, 'deleteList']);

            // VideoInformationAndSolution
            Route::get('video-information-and-solution', [VideoInformationAndSolutionController::class, 'getInfo']);
            Route::put('video-information-and-solution', [VideoInformationAndSolutionController::class, 'update']);

            // ServiceCategory
            Route::get('service-categories', [ServiceCategoryController::class, 'index']);
            Route::post('service-categories', [ServiceCategoryController::class, 'store']);
            Route::put('service-categories/{id}', [ServiceCategoryController::class, 'update']);
            Route::delete('service-categories/{id}', [ServiceCategoryController::class, 'destroy']);

            // Services
            Route::get('services', [ServiceController::class, 'index']);
            Route::post('services', [ServiceController::class, 'store']);
            Route::put('services/{id}', [ServiceController::class, 'update']);
            Route::delete('services/{id}', [ServiceController::class, 'destroy']);
        });
    });
});
