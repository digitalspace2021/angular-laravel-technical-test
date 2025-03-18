<?php

use App\Http\Controllers\course\AllCourseController;
use App\Http\Controllers\course\ShowCourseController;
use App\Http\Controllers\course\StoreCourseController;
use App\Http\Controllers\student\AllStudentController;
use App\Http\Controllers\student\DestroyStudentController;
use App\Http\Controllers\student\ShowStudentController;
use App\Http\Controllers\student\StoreStudentController;
use App\Http\Controllers\student\UpdateStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('/student')->group((function () {
    Route::get('/', AllStudentController::class);
    Route::post('/', StoreStudentController::class);
    Route::get('/{id}', ShowStudentController::class);
    Route::put('/{id}', UpdateStudentController::class);
    Route::delete('/{id}', DestroyStudentController::class);
}));

Route::prefix('/course')->group((function () {
    Route::get('/', AllCourseController::class);
    Route::post('/', StoreCourseController::class);
    Route::get('/{id}', ShowCourseController::class);
    Route::put('/{id}', AllCourseController::class);
    Route::delete('/{id}', AllCourseController::class);
}));
