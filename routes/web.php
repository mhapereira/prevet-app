<?php

use App\Http\Controllers\DownloadPdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laudo/{registro}/pdf/download', [DownloadPdfController::class, 'microbiologico_pdf'])->name('microbiologico.pdf.download');
