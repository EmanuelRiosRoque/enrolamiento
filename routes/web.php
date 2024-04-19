<?php

use App\Http\Controllers\empleados;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Http\Controllers\petitionController;
use App\Http\Controllers\empleadosController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/editEmpleado', [PetitionController::class, 'index'])->name('update.index');
Route::post('/editEmpleado/{id}', [PetitionController::class, 'update'])->name('update.update');



Route::get('/showEmpleados', [empleadosController::class, 'index'])->name('empleados.index');
Route::post('/sendEmail', [empleadosController::class, 'sendFormat'])->name('empleados.email');



Route::get('/download/{numeroEmpleado}', [empleadosController::class, 'downloadDocumento'])->name('download.documento');
Route::get('/download-pdf',[PDFController::class, 'downloadPDF'])->name('download.pdf');
