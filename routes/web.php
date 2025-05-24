<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveEventController;
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
        Route::resource('event', EventController::class)->only(['index', 'show']);
        Route::resource('space', SpaceController::class)->only(['index', 'show']);
        Route::get('this-week-events', [EventController::class, 'showThisWeekEvents'])->name('thisWeekEvents');
        Route::get('events-in-space/{id}', [EventController::class, 'eventsInSpace'])->name('eventsInSpace');
        Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
        Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
        Route::get('/calendar', [EventController::class, 'calendar'])->name('calendar');
        Route::get('/calendar/events/{year}/{month}', [EventController::class, 'getEventsByMonth']);
        Route::get('/calendar/day/{date}', [EventController::class, 'getEventsByDate']);
        // Rutas solo accesibles para usuarios autenticados
        Route::middleware('auth')->group(function () {
            Route::resource('comment', CommentController::class);
            Route::post('/save-event/{id}', [SaveEventController::class, 'save'])->name('save-event');
            Route::delete('/unsave-event/{id}', [SaveEventController::class, 'unsave'])->name('unsave-event');
            Route::get('/save-events', [SaveEventController::class, 'index'])->name('save-events.index');
        });

        // Rutas para admins: 'admin' o 'admin_espacio'
        Route::prefix('admin')->middleware(['auth', 'role:admin|admin_space'])->group(function () {
            Route::resource('space', SpaceController::class)->except(['index', 'show']);
            Route::resource('event', EventController::class)->except(['index', 'show']);
            Route::resource('category', CategoryController::class);
            Route::resource('type', TypeController::class);
            Route::resource('user', UserController::class);
            Route::get('/panel', function () {
                return view('view_components.adminPanel');
            })->name('admin.panel');
            Route::get('/admin/spaces', [SpaceController::class, 'list'])->name('space.list');
            Route::get('/admin/events', [EventController::class, 'list'])->name('event.list');
            Route::get('/deletePastEvents', [EventController::class, 'deletePastEvents'])->name('event.deletePast');
        });
    }
);
