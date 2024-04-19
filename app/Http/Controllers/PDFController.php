<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadPDF($pdfFilePath)
    {
        // Descargar el archivo PDF
        return Response::download($pdfFilePath)->deleteFileAfterSend(true);
    }
}
