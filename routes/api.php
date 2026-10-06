<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/organization', [OrganizationController::class, 'getAllOrganizations'])->name('all');
Route::post('/organization/create', [OrganizationController::class, 'createOrganization'])->name('create');
Route::patch('/organization/edit/{id}', [OrganizationController::class, 'updateOrganization'])
    ->name('update');

// Creating a course
Route::prefix('/course')->group(function () {
    Route::post('/create', [CourseController::class, 'createCourse'])->name('create-course');
    Route::get('/get/{id}', [CourseController::class, 'getCourse'])->name('get-course-by-id');
    Route::prefix('/content')->group(function () {
        Route::post('/create', [CourseController::class, 'createCourseContent'])->name('create-course-content');
    });
    Route::prefix('/media-content')->group(function () {
        Route::post('/create', [CourseController::class, 'createCourseMediaContent'])->name('create-media-content');
    });
});