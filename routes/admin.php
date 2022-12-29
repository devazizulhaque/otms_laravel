<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseSubCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Front\EnrollController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('course-categories', CourseCategoryController::class);
    Route::resource('course-sub-categories', CourseSubCategoryController::class);
    Route::resource('courses', CourseController::class)->middleware('teacher');

    Route::get('/approve-course/{id}', [CourseController::class, 'approveCourse'])->name('courses.approve')->middleware('admin');
    Route::post('/get-sub-category-by-category-id', [CourseController::class, 'getSubCategory'])->name('get-sub-category-by-category-id');

    Route::get('/manage-enrolls', [EnrollController::class, 'manageEnroll'])->name('manage-enroll')->middleware('admin');
});
