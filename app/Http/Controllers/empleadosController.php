<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\UpdateEmpleados;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use App\Notifications\SendFormat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Notification;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $term = $request->input('term');

    // Realiza la búsqueda de empleados por número de empleado
    $empleados = UpdateEmpleados::where('nuM_EMPL', 'LIKE', "%$term%")
                                 ->orderByDesc('id')
                                 ->paginate(30);

    return view('empleados.show', [
        'empleados' => $empleados,
    ]);
}

    /**
     * Download document.
     */

    public function downloadDocumento($numeroEmpleado)
    {
        try {
            // Definir la ruta de la biblioteca mPDF
            Settings::setPdfRendererPath(base_path('vendor/mpdf/mpdf'));
            Settings::setPdfRendererName('MPDF');

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

            // Convertir el documento DOCX a PDF usando mPDF
            $phpWord = IOFactory::load($documentoGenerado);
            $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
            $pdfFilename = time() . '.pdf';
            $pdfPath = public_path('temp/' . $pdfFilename);

            // Guardar el PDF con los márgenes configurados
            $pdfWriter->save($pdfPath);

            // Descargar el PDF generado
            return response()->download($pdfPath, 'documentoGenerado.pdf');
        } catch (\Exception $e) {
            // Si ocurre un error, regresar a la página anterior con el código de error
            dd($e->getMessage());
        }
    }


    public function sendFormat(Request $request, $nEmpleado)
    {

        $user = UpdateEmpleados::where('nuM_EMPL', $nEmpleado)->first();

        $nombre = $user->nombres;
        $apellidoPaterno = $user->apellidop;
        $apellidoMaterno = $user->apellidom;
        $nombreCompleto = $nombre . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno;

        $links = [];

        // Verifica si se ha cargado un archivo
        if ($request->hasFile('file')) {
            // Obtiene el archivo cargado
            $documento = $request->file('file');

            // Verifica si el archivo es un PDF y cumple con el límite de tamaño
            if ($documento->getClientOriginalExtension() === 'pdf' && $documento->getSize() < 5000000) {
                try {
                    // Lee el contenido del archivo y codifícalo en base64
                    $base64 = base64_encode(file_get_contents($documento->getRealPath()));

                    // Construye el objeto de información para enviar a la API
                    $infoApi = [
                        "metadata"   => ["id_datoadicional" => 9, "area_tsjcdmx" => "DDMS"],
                        "filename"   => $documento->getClientOriginalName(),
                        "doc_base64" => $base64,
                    ];

                    // Realiza la solicitud POST a la API utilizando GuzzleHttp
                    $client = new Client();
                    $response = $client->post('http://172.19.40.132:8000/api/sintra', [
                        'headers' => ['Content-Type' => 'application/json'],
                        'body' => json_encode($infoApi)
                    ]);

                    // Obtiene la respuesta de la API
                    $responseData = json_decode($response->getBody(), true);

                    // Obtén el enlace generado por la API
                    $apiLink = $responseData['url']; // Ajusta esto según la estructura de la respuesta de tu API

                    // Pasa el enlace como dato a la notificación
                    Notification::route('mail', $request->email)
                        ->notify(new SendFormat($apiLink, $nombreCompleto));


                    // Mensaje de éxito
                    return back()->withSuccess('Documento enviado correctamente.');
                } catch (\Exception $e) {
                    // Maneja cualquier excepción que pueda ocurrir durante la solicitud a la API
                    dd('Error al enviar el documento: ' . $e->getMessage());
                }
            } else {
                // Archivo no válido
                dd('El archivo debe ser un PDF y no debe exceder los 5MB.');
            }
        } else {
            // No se cargó ningún archivo
            dd('No se ha seleccionado ningún archivo.');
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
    public function destroy($nEmpleado)
    {
        // Encuentra el empleado por su número de empleado
        $empleado = UpdateEmpleados::where('nuM_EMPL', $nEmpleado)->firstOrFail();

        // Elimina el empleado
        $empleado->delete();

        // Redirige con un mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
