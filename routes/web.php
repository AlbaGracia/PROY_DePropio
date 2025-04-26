<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Space;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Middlewares\RoleMiddleware;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', function () {
            return view('index');
        })->name('index');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';

        // Rutas públicas (para todos, usuarios registrados o no registrados)
        Route::resource('user', UserController::class)->only(['index', 'show']);
        Route::resource('event', EventController::class)->only(['index', 'show']);
        Route::resource('space', SpaceController::class)->only(['index', 'show']);
        Route::resource('category', CategoryController::class)->only(['index', 'show']);
        Route::resource('type', TypeController::class)->only(['index', 'show']);
        Route::get('this-week-events', [EventController::class, 'showThisWeekEvents'])->name('thisWeekEvents');
        Route::get('events-in-space/{id}', [EventController::class, 'eventsInSpace'])->name('eventsInSpace');
        // Rutas solo accesibles para usuarios autenticados
        Route::middleware('auth')->group(function () {
            Route::resource('comment', CommentController::class); // Solo pueden comentar los usuarios autenticados
        });

        // Rutas para admins: 'admin' o 'admin_espacio'
        Route::prefix('admin')->middleware(['auth', 'role:admin|admin_espacio'])->group(function () {
            Route::resource('space', SpaceController::class)->except(['index', 'show']);
            Route::resource('event', EventController::class)->except(['index', 'show']);
            Route::resource('category', CategoryController::class)->except(['index', 'show']);
            Route::resource('type', TypeController::class)->except(['index', 'show']);
            Route::resource('user', UserController::class)->except(['index', 'show']);
        });
    }
);
