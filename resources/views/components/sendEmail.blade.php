
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 flex flex-col items-center justify-center hidden w-full h-screen overflow-x-hidden overflow-y-auto md:inset-0">
    <!-- Fondo semitransparente -->
    <div class="fixed top-0 bottom-0 left-0 right-0 bg-black opacity-50"></div>
    <!-- Contenido del modal -->
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Enviar documento
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar Ventana Emergente</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="POST" action="{{route('empleados.email', ['nEmpleado' => $empleado->nuM_EMPL])}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="flex items-center hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert" id="alerta-bouth">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Verifica!</span> Alguno de los campos esta vacio.
                        </div>
                    </div>

                    <div id="alerta-gmail" class="flex items-center hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Verifica!</span> El campo correo es invalido solo se aceptan @gmail @hotmail @outlook @yahoo.
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo del Empleado</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="correo@correo.com" required />
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-full mt-3">
                            <label for="dropzone-file" id="dropzone-label" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir documento</span> o arrastra documento</p>
                                    <p class="text-xs text-gray-500">PDF (*SOLO PDF*)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="file" class="hidden" accept=".pdf" />
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 w-full cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn">Enviar Formato</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="loader" class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full bg-black bg-opacity-75">
    <x-loaderComponent />
</div>


@push('js')
    <script src="{{asset('js/loaderEmail.js')}}"></script>
@endpush

