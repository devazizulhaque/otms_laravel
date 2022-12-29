<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\EnrollController;


Route::as('front.')->group(function (){
    Route::get('/', [FrontController::class, 'home'])->name('home');
    Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('about');
    Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contact');
    Route::get('/category-courses/{id}', [FrontController::class, 'categoryCourses'])->name('course-category');
    Route::get('/course/{slug}', [FrontController::class, 'courseDetails'])->name('course.details');
    Route::get('/checkout/{slug}', [FrontController::class, 'checkoutPage'])->name('checkout-page');
    Route::post('/place-order', [EnrollController::class, 'placeOrder'])->name('course.order');
});



