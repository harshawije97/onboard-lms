<?php

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