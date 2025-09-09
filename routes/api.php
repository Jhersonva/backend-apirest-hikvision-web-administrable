<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\OurTeam\OurTeamController;
use App\Http\Controllers\Api\SpecialtyCategory\SpecialtyCategoryController;
use App\Http\Controllers\Api\Testimonial\TestimonialController;
use App\Http\Controllers\Api\ChooseUs\ChooseUsController;
use App\Http\Controllers\Api\PaymentPlan\PaymentPlanController;
use App\Http\Controllers\Api\InformationContact\InformationContactController;
use App\Http\Controllers\Api\Portfolio\PortfolioController;
use App\Http\Controllers\Api\PortfolioCategory\PortfolioCategoryController;
use App\Http\Controllers\Api\CounterService\CounterServiceController;
use App\Http\Controllers\Api\Servics\ServiceController;
use App\Http\Controllers\Api\ServiceCategory\ServiceCategoryController;
use App\Http\Controllers\Api\VideoInformationAndSolution\VideoInformationAndSolutionController;
use App\Http\Controllers\Api\AboutUs\AboutUsController;
use App\Http\Controllers\Api\Feature\FeatureController;
use App\Http\Controllers\Api\Carousel\CarouselController;
use App\Http\Controllers\Api\SocialNetwork\SocialNetworkController;
use App\Http\Controllers\Api\ContactInformationCompany\ContactInformationCompanyController;
use App\Http\Controllers\Api\SectionTitle\SectionTitleController;
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

            // Section Title
            Route::get('section-titles', [SectionTitleController::class, 'index']);
            Route::get('section-titles/{id}', [SectionTitleController::class, 'show']);
            Route::post('section-titles/', [SectionTitleController::class, 'store']);
            Route::put('section-titles/{id}', [SectionTitleController::class, 'update']);
            Route::delete('section-titles/{id}', [SectionTitleController::class, 'destroy']);

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
            Route::put('about-us/update', [AboutUsController::class, 'update']);
                // list_about_us CRUD
                Route::get('about-us/list', [AboutUsController::class, 'listAll']);
                Route::post('about-us/list', [AboutUsController::class, 'add']);
                Route::put('about-us/list/{index}', [AboutUsController::class, 'updateList']);
                Route::delete('about-us/list/{index}', [AboutUsController::class, 'deleteList']);

            // VideoInformationAndSolution
            Route::get('video-information-and-solution', [VideoInformationAndSolutionController::class, 'getInfo']);
            Route::put('video-information-and-solution/update', [VideoInformationAndSolutionController::class, 'update']);

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

            // CounterServices
            Route::get('counter-services', [CounterServiceController::class, 'index']);
            Route::put('counter-services/{id}', [CounterServiceController::class, 'update']);

            // PortfolioCategory
            Route::get('portfolio-categories', [PortfolioCategoryController::class, 'index']);
            Route::post('portfolio-categories', [PortfolioCategoryController::class, 'store']);
            Route::put('portfolio-categories/{id}', [PortfolioCategoryController::class, 'update']);
            Route::delete('portfolio-categories/{id}', [PortfolioCategoryController::class, 'destroy']);

            // Portfolio
            Route::get('portfolios', [PortfolioController::class, 'index']);
            Route::post('portfolios', [PortfolioController::class, 'store']);
            Route::put('portfolios/{id}', [PortfolioController::class, 'update']);
            Route::delete('portfolios/{id}', [PortfolioController::class, 'destroy']);

            // InformationContact
            Route::get('information-contact', [InformationContactController::class, 'getInfo']);
            Route::put('information-contact/update', [InformationContactController::class, 'update']);

            // PaymentPlan
            Route::get('payment-plans', [PaymentPlanController::class, 'index']);
            Route::post('payment-plans', [PaymentPlanController::class, 'store']);
            Route::put('payment-plans/{id}', [PaymentPlanController::class, 'update']);
            Route::delete('payment-plans/{id}', [PaymentPlanController::class, 'destroy']);

            // ChooseUs
            Route::get('choose-us', [ChooseUsController::class, 'getInfo']);
            Route::put('choose-us/update', [ChooseUsController::class, 'update']);
                // list_choose_us
                Route::get('choose-us/list', [ChooseUsController::class, 'listAll']);
                Route::post('choose-us/list', [ChooseUsController::class, 'addList']);
                Route::put('choose-us/list/{id}', [ChooseUsController::class, 'updateList']);
                Route::delete('choose-us/list/{id}', [ChooseUsController::class, 'deleteList']);
                // note_list
                Route::get('choose-us/note-list', [ChooseUsController::class, 'noteListAll']);
                Route::post('choose-us/note-list', [ChooseUsController::class, 'addNote']);
                Route::put('choose-us/note-list/{id}', [ChooseUsController::class, 'updateNote']);
                Route::delete('choose-us/note-list/{id}', [ChooseUsController::class, 'deleteNote']);

            // Testimonial
            Route::get('testimonials', [TestimonialController::class, 'index']);
            Route::post('testimonials', [TestimonialController::class, 'store']);
            Route::put('testimonials/{id}', [TestimonialController::class, 'update']);
            Route::delete('testimonials/{id}', [TestimonialController::class, 'destroy']);

            // SpecialtyCategory
            Route::get('specialty-categories', [SpecialtyCategoryController::class, 'index']);
            Route::post('specialty-categories/', [SpecialtyCategoryController::class, 'store']);
            Route::put('specialty-categories/{id}', [SpecialtyCategoryController::class, 'update']);
            Route::delete('specialty-categories/{id}', [SpecialtyCategoryController::class, 'destroy']);

            // OurTeam
            Route::get('our-team', [OurTeamController::class, 'index']);
            Route::post('our-team', [OurTeamController::class, 'store']);
            Route::put('our-team/{id}', [OurTeamController::class, 'update']);
            Route::delete('our-team/{id}', [OurTeamController::class, 'destroy']);
        });
    });
});
