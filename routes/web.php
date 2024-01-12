<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LatesController;


Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');


    Route::get('/', function () {
        return view('home');
    })->name('home.page');



    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rombel')->name('rombel.')->group(function () {
        Route::get('/create', [RombelsController::class, 'create'])->name('create');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('/', [RombelsController::class, 'index'])->name('home');
        Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/rayon')->name('rayon.')->group(function () {
        Route::get('/create', [RayonsController::class, 'create'])->name('create');
        Route::post('/store', [RayonsController::class, 'store'])->name('store');
        Route::get('/', [RayonsController::class, 'index'])->name('home');
        Route::get('/{id}', [RayonsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/student')->name('student.')->group(function () {
        Route::get('/create', [StudentsController::class, 'create'])->name('create');
        Route::post('/store', [StudentsController::class, 'store'])->name('store');
        Route::get('/', [StudentsController::class, 'index'])->name('home');
        Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
    });
    Route::prefix('/late')->name('late.')->group(function () {
        Route::get('/create', [LatesController::class, 'create'])->name('create');
        Route::post('/store', [LatesController::class, 'store'])->name('store');
        Route::get('/', [LatesController::class, 'index'])->name('home');
        Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
        Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
        Route::get('/data/rekap', [LatesController::class, 'data'])->name('data');
        Route::get('/data/{name}', [LatesController::class, 'show'])->name('rekap');
        Route::get('/cetaklate/{id}/{count}', [LatesController::class, 'cetakLate'])->name('cetak');
        Route::get('/late/export-excel', [LatesController::class, 'exportExcel'])->name('exportExcel');
    });




