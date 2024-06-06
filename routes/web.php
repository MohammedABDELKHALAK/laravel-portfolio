<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ShowMessagesController;
use App\Http\Controllers\SkillController;
use App\Http\Middleware\ShareProfileData;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('gate');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ShowMessagesController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/show/{id}', [ShowMessagesController::class, 'show'] )->middleware(['auth', 'verified'])->name('show.message');
Route::get('/delete/all-mesagges', [ShowMessagesController::class, 'deleteAll'] )->middleware(['auth', 'verified'])->name('delete.all.message');
Route::get('/restore/all-mesagges', [ShowMessagesController::class, 'restoreAll'] )->middleware(['auth', 'verified'])->name('restore.all.message');

Route::get('/pagination', [ShowMessagesController::class, 'updatePagination'] )->middleware(['auth', 'verified'])->name('pagination-perpage');

// Route::get('/messages', [ShowMessagesController::class, 'index']);

Route::resource('skills', SkillController::class)->middleware(['auth', 'verified']);
Route::get('skillspdf', [SkillController::class, 'exportPDF'])->name('skills.exportpdf')->middleware(['auth', 'verified']);
Route::resource('projects', ProjectController::class)->middleware(['auth', 'verified']);
Route::resource('experience', ExperienceController::class)->middleware(['auth', 'verified']);
Route::get('experienceExel', [ExperienceController::class, 'exportExcel'])->name('experiences.exportExcel')->middleware(['auth', 'verified']);
Route::resource('education', EducationController::class)->middleware(['auth', 'verified']);

// Route::resource('resume', ResumeController::class);

// if you use this method ->middleware(ShareProfileData::class) you don't need to declarate on kernel.php
//  i have already daclarate on kernel.php, i add ->middleware(ShareProfileData::class) here for autolearning that  
// there is other method

Route::get('/home', [ResumeController::class, 'home'])->name('resume.home')->middleware(ShareProfileData::class);
Route::get('/resume', [ResumeController::class, 'resume'])->name('resume.resume')->middleware(ShareProfileData::class);
Route::get('/project', [ResumeController::class, 'project'])->name('resume.project')->middleware(ShareProfileData::class);

//this is other method but need in kernel to protected $routeMiddleware also

// Route::middleware(['web', 'share.profile'])->group(function () {
//     Route::get('/home', [ResumeController::class, 'home'])->name('resume.home');
//     Route::get('/resume', [ResumeController::class, 'resume'])->name('resume.resume');
//     Route::get('/project', [ResumeController::class, 'project'])->name('resume.project');
// });


Route::get('/dowloandPDF', [ResumeController::class, 'dowloandPDF'])->name('dowloandPDF');
Route::get('/contact', [ResumeController::class, 'indexContact'])->name('resume.contact');
Route::post('/contact', [ResumeController::class, 'sendEmail'])->name('send');

// Route::get('/contact', [ContactController::class, 'index'])->name('resume.contact');
// Route::post('/contact', [ContactController::class, 'sendEmail'])->name('send');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/{id}', [ProfileController::class, 'profileImage'])->name('profile.image');
    Route::delete('/profile/{id}', [ProfileController::class, 'forceDelete'])->name('profile.force.delete');
    Route::put('/profile/social/{id}', [ProfileController::class, 'socialform'])->name('profile.socialform');
    
   
});

require __DIR__.'/auth.php';
