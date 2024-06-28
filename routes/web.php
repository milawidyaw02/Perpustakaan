<?php

use App\Http\Controllers\PerpusController;
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

Route::get('/', [PerpusController::class, 'formLogin']);
Route::post('/aksiLogin', [PerpusController::class, 'aksiLogin']);
Route::get('/formRegistrasi', [PerpusController::class, 'formRegistrasi']);
Route::post('/aksiRegistrasi', [PerpusController::class, 'aksiRegistrasi']);
Route::get('/dashboardAdmin', [PerpusController::class, 'dashboardAdmin']);
Route::get('halamanAnggota',[PerpusController::class, 'halamanAnggota']);
Route::post('/aksiTambahAnggota', [PerpusController::class, 'aksiTambahAnggota']);
Route::post('/aksiUbahAnggota/{id}', [PerpusController::class, 'aksiUbahAnggota']);
Route::get('/aksiHapusAnggota/{id}', [PerpusController::class, 'aksiHapusAnggota']);
Route::get('halamanBuku',[PerpusController::class, 'halamanBuku']);
Route::post('/aksiTambahBuku', [PerpusController::class, 'aksiTambahBuku']);
Route::post('/aksiUbahBuku/{id}', [PerpusController::class, 'aksiUbahBuku']);
Route::get('/aksiHapusBuku/{id}', [PerpusController::class, 'aksiHapusBuku']);
Route::get('/halamanPeminjaman', [PerpusController::class, 'halamanPeminjaman']);
Route::post('/aksiTambahPeminjaman', [PerpusController::class, 'aksiTambahPeminjaman']);
Route::post('/aksiUbahPeminjaman/{id}', [PerpusController::class, 'aksiUbahPeminjaman']);
Route::get('/laporanBuku', [PerpusController::class, 'laporanBuku']);
Route::get('/eksportPdf', [PerpusController::class, 'eksportPdf']);
Route::get('/bukuAPI', [PerpusController::class, 'getBookInfo']);
Route::get('/eksportExcel', [PerpusController::class, 'exportExcel']);
Route::get('/qrCodeBuku/{id}', [PerpusController::class, 'showQRCode']);
Route::get('/logout',[PerpusController::class, 'logout']);