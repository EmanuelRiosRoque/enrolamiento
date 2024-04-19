<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\UpdateEmpleados;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = UpdateEmpleados::all();
        // dd($empleados);
        return view('empleados.show', [
            'empleados' => $empleados
        ]);
    }

    /**
     * Download document.
     */

     public function downloadDocumento($numeroEmpleado)
{
    try {
        // Buscar el empleado en la base de datos basado en el número de empleado proporcionado
        $empleado = UpdateEmpleados::where('nuM_EMPL', $numeroEmpleado)->first();

        // Verificar si se encontró el empleado
        if (!$empleado) {
            return back()->withError('No se encontró ningún empleado con el número proporcionado');
        }

        // Crear un nuevo TemplateProcessor con el documento de Word
        $template = new TemplateProcessor('template/enrolamiento 2.docx');

        // Asignar los valores del empleado al documento
        $template->setValue('NUM_EMPLEADO', $empleado->nuM_EMPL);
        $template->setValue('NOMBRE', $empleado->nombres);
        $template->setValue('AP_PAT', $empleado->apellidop);
        $template->setValue('AP_MAT', $empleado->apellidom);
        $template->setValue('RFC', $empleado->rfc);
        $template->setValue('ID_POS', $empleado->plaza);
        // Asigna los demás valores según las variables en tu documento de Word

        // Guardar el documento modificado en una carpeta temporal dentro de public
        $documentoGenerado = public_path('temp/documentoGenerado.docx');
        $template->saveAs($documentoGenerado);

        // Convertir el documento DOCX a PDF usando DomPDF
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $phpWord = IOFactory::load($documentoGenerado);
        $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
        $pdfFilename = time() . '.pdf';
        $pdfPath = public_path('temp/' . $pdfFilename);
        $pdfWriter->save($pdfPath);

        // Descargar el PDF generado
        return response()->download($pdfPath, 'documentoGenerado.pdf');

    } catch (\Exception $e) {
        // Si ocurre un error, regresar a la página anterior con el código de error
        return back()->withError($e->getMessage());
    }
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
