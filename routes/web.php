<?php

use App\Http\Controllers\empleados;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Http\Controllers\petitionController;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\InmueblesController;
use App\Http\Controllers\Info;

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
    Route::get('/busqueda', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/editEmpleado', [PetitionController::class, 'index'])->name('update.index');
Route::post('/editEmpleado/{id}', [PetitionController::class, 'update'])->name('update.update');


Route::get('/Inmueble', [InmueblesController::class, 'index'])->name('inmuebles.index');
Route::post('/Inmueble/create', [InmueblesController::class, 'create'])->name('inmuebles.create');



Route::get('/showEmpleados', [empleadosController::class, 'index'])->name('empleados.index');
Route::post('/sendEmail/{nEmpleado}', [empleadosController::class, 'sendFormat'])->name('empleados.email');
Route::get('/delete/{nEmpleado}', [empleadosController::class, 'destroy'])->name('empleados.delete');



Route::get('/download/{numeroEmpleado}', [empleadosController::class, 'downloadDocumento'])->name('download.documento');
Route::get('/download/{numeroEmpleado}/word', [empleadosController::class, 'downloadDocumentoDocx'])->name('download.documentoWord');
Route::get('/download-pdf',[PDFController::class, 'downloadPDF'])->name('download.pdf');

Route::get('/info', [Info::class, 'index'])->name('info');
