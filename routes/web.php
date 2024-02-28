<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\SocialiteController;
use App\Models\User;
use Spatie\Permission\Commands\Show;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('genre', function () {
    return view('genre');
});

Route::get('/admin', function () {
    return view('adminDash');
});
Route::get('/statistics', function () {
    return view('statistics');
});

Route::get("/featch", [MovieController::class, "fetchApiMovie"]);
Route::get("auth/google", [SocialiteController::class, "redirectToGoogle"]);
Route::get("auth/google/callback", [SocialiteController::class, "handleGoogle"]);
Route::get("auth/github", [SocialiteController::class, "redirectToGithub"]);
Route::get("auth/github/callback", [SocialiteController::class, "handleGithub"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/callback', [ProviderController::class, 'callback']);

// Route::get('/auth/callback', function () {
//     $githubUser = Socialite::driver('github')->user();

//     $user = User::updateOrCreate([
//         'github_id' => $githubUser->id,
//     ], [
//         'name' => $githubUser->name,
//         'email' => $githubUser->email,
//         'github_token' => $githubUser->token,
//         'github_refresh_token' => $githubUser->refreshToken,
//     ]);

//     Auth::login($user);

//     return redirect('/dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin routes
Route::get('/admin/statistics', [FilmController::class, 'index'])->name('admin.dashboard');
Route::get('/admin', [FilmController::class, 'allFilm'])->name('admin.allFilm');
Route::put('/admin/{id}', [FilmController::class, 'update'])->name('film.update');
Route::post('/admin/store', [FilmController::class, 'store'])->name('film.store');
Route::delete('/admin/{id}', [FilmController::class, 'destroy'])->name('film.delete');
// end admin routes


// statistics start
Route::get('/statistics', function () {
    return view('admin.statistics');
});
// statistics end


require __DIR__ . '/auth.php';



Route::get("seat", function () {
    return view("seat.index");
});

Route::get("single_film", [
    MovieController::class, "show"
]);
