<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenulisController;
use App\Models\Penulis;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $penulis = Penulis::all();
    $buku = Buku::all();
    return view('welcome', compact('penulis', 'buku'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('penulis', PenulisController::class);
Route::resource('buku', BukuController::class);

// Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
//     Route::('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
