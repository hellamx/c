<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers as C;

/**
 * Главная страница
 */
Route::get('/', [C\MainController::class, 'index'])->name('main');

/**
 * Маршруты авторизации
 */
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [C\AdminController::class, 'login'])->name('login');
    Route::post('/admin/login/auth', [C\AdminController::class, 'auth'])->name('auth');
});

/**
 * Маршруты страниц
 */
Route::get('/pages/{url}', [C\MainController::class, 'show']);

/**
 * Маршруты админки
 */
Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [C\AdminController::class, 'index'])->name('index');
    Route::post('/', [C\AdminController::class, 'logout'])->name('logout');

    Route::resource('/pages', C\AdminPageController::class);

    Route::resource('/user', C\AdminUserController::class);

    Route::get('/presentation', [C\AdminPresentationController::class, 'index'])->name('presentation.index');
    Route::get('/presentation/image', [C\AdminPresentationController::class, 'image'])->name('presentation.image');
    Route::post('/presentation/upload', [C\AdminPresentationController::class, 'uploadImg'])->name('presentationImage.upload');
    Route::post('/presentation/update', [C\AdminPresentationController::class, 'update'])->name('presentation.update');
    Route::post('/presentation/icon', [C\AdminPresentationController::class, 'uploadIcon'])->name('presentation.icon');

    Route::put('/sidebar/update', [C\AdminPageController::class, 'updateSidebar'])->name('updateSidebar');

    Route::post('/image/upload', [C\AdminUserController::class, 'uploadImg'])->name('image.upload');

    Route::get('/title/presentation', [C\AdminTitleController::class, 'presentation'])->name('title.presentation');
    Route::get('/title/reviews', [C\AdminTitleController::class, 'reviews'])->name('title.reviews');
    Route::get('/title/list', [C\AdminTitleController::class, 'list'])->name('title.list');
    Route::post('/title/update', [C\AdminTitleController::class, 'update'])->name('title.update');

    Route::resource('/review', C\AdminReviewController::class);

    Route::get('/list', [C\AdminListController::class, 'index'])->name('list.index');
    Route::post('/list/update', [C\AdminListController::class, 'update'])->name('list.update');
});