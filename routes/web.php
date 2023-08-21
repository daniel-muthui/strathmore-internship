<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipController;
use App\Models\Internship;

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



Route::get('/dashboard', function () {
    $companies = Internship::all();
    return view('dashboard', ['company' => $companies]);
    // return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard/internship', [InternshipController::class, 'index'])->name('internship.index');
    Route::post('/dashboard/internship/edit', [InternshipController::class, 'EditAction'])->name('internship.edit');
    Route::get('/dashboard/internship/delete/{id}', [InternshipController::class, 'DeleteAction'])->name('internship.delete');
    Route::get('/dashboard/internship/create', [InternshipController::class, 'create'])->name('internship.create');
    Route::post('/dashboard/internship', [InternshipController::class, 'store'])->name('internship.store');
    Route::get('/fetch-description', [InternshipController::class, 'fetchDescription']);
    Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
  
    
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
