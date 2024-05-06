<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Modificados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-container>
                    @if (session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Exito!</span> {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Error!</span> {{ session('error') }}
                        </div>
                    </div>
                    @endif

                    <div class="mb-4 text-4xl text-center">
                        <h2>Lista de empleados modificados</h2>
                    </div>

                    <form action="{{ route('empleados.index') }}" method="GET" class="max-w-md mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                <svg class="w-4 h-4 text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="searchInput" name="term" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-teal-500 focus:border-teal-500" placeholder="Buscar empleado por número"/>
                            <button type="submit" class="text-white absolute end-14 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <button type="submit" class="text-white absolute end-1.5 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2">Todo</button>
                        </div>
                    </form>


                    <div class="mt-5">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div id="listaEmpleados">
                                @if ($empleados->isNotEmpty())
                                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    N° Empleado
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Nombre Completo
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    RFC
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-3">
                                                    CURP
                                                </th> --}}
                                                {{-- <th scope="col" class="px-6 py-3">
                                                    Puesto
                                                </th> --}}
                                                <th scope="col" class="px-6 py-3">
                                                    Informacion de Captura
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Generar PDF
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Enviar Correo
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-3">
                                                    Accion
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($empleados as $empleado)
                                          @if (auth()->user()->id == 1 || $empleado->fk_usrCreated == auth()->user()->id)

                                            <tr id="empleado_{{$empleado->nuM_EMPL}}" class="bg-white hover:bg-gray-50 ">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{$empleado->nuM_EMPL}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{$empleado->nombres}} {{$empleado->apellidop}} {{$empleado->apellidom}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$empleado->rfc}}
                                                </td>
                                                {{-- <td class="px-6 py-4">
                                                    {{$empleado->curp}}
                                                </td> --}}
                                                {{-- <td class="px-6 py-4">
                                                    {{$empleado->puesto}}
                                                </td> --}}
                                                <td class="px-6 py-4">
                                                    <button data-modal-target="timeline-modal-{{$empleado->id}}" data-modal-toggle="timeline-modal-{{$empleado->id}}" class="inline-flex items-center px-4 py-2 font-bold rounded cursor-pointer text-amber-900 bg-amber-500 hover:bg-amber-600" type="button">
                                                        <i class="mr-1 fa-solid fa-circle-info"></i>
                                                        <span>Informacion</span>
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a  href="{{route('download.documento', ["numeroEmpleado" => $empleado->nuM_EMPL])}}" class="inline-flex items-center px-4 py-2 font-bold text-teal-900 bg-teal-500 rounded cursor-pointer hover:bg-teal-600">
                                                        <i class="mr-1 fa-solid fa-file-pdf"></i>
                                                        <span>PDF</span>
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <button data-modal-target="authentication-modal-{{$empleado->nuM_EMPL}}" data-modal-toggle="authentication-modal-{{$empleado->nuM_EMPL}}" class="inline-flex items-center px-4 py-2 font-bold text-blue-900 bg-blue-500 rounded cursor-pointer hover:bg-blue-600" type="button">
                                                        <i class="mr-1 fa-solid fa-envelope"></i>
                                                        <span>Enviar correo</span>
                                                    </button>
                                                </td>
                                                {{-- <td class="px-6 py-4">
                                                    <button data-modal-target="popup-modal-{{$empleado->nuM_EMPL}}" data-modal-toggle="popup-modal-{{$empleado->nuM_EMPL}}" class="inline-flex items-center px-4 py-2 font-bold text-red-900 bg-red-500 rounded cursor-pointer hover:bg-red-600" type="button">
                                                        <i class="mr-1 fa-solid fa-eraser"></i>
                                                        <span>Eliminar</span>
                                                    </button>
                                                </td> --}}
                                            </tr>

                                                <x-registro :empleado="$empleado" :correos="$empleado->emailRegistros" />


                                                <div id="authentication-modal-{{$empleado->nuM_EMPL}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 flex flex-col items-center justify-center hidden w-full h-screen overflow-x-hidden overflow-y-auto md:inset-0">
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
                                                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal-{{$empleado->nuM_EMPL}}">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                    </svg>
                                                                    <span class="sr-only">Cerrar Ventana Emergente</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 md:p-5">
                                                                <form class="space-y-4" method="POST" action="{{ route('empleados.email', ['nEmpleado' => $empleado->nuM_EMPL]) }}" enctype="multipart/form-data" id="myForm-{{ $empleado->nuM_EMPL }}">
                                                                    @csrf
                                                                    <div class="flex items-center hidden p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 alert" role="alert" id="alerta-bouth-{{ $empleado->nuM_EMPL }}">
                                                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                                        </svg>
                                                                        <span class="sr-only">Info</span>
                                                                        <div>
                                                                            <span class="font-medium">¡Verifica!</span> Alguno de los campos está vacío.
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
                                                                        <input type="email" name="email" id="email-{{ $empleado->nuM_EMPL }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="correo@correo.com" />
                                                                    </div>
                                                                    <div>
                                                                        <div class="flex items-center justify-center w-full mt-3">
                                                                            <label for="dropzone-file-{{ $empleado->nuM_EMPL }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                                    </svg>
                                                                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir documento</span> o arrastra documento</p>
                                                                                    <p class="text-xs text-gray-500">PDF (*SOLO PDF*)</p>
                                                                                </div>
                                                                                <input id="dropzone-file-{{ $empleado->nuM_EMPL }}" type="file" name="file" class="hidden" accept=".pdf"/>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="mt-3 w-full cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center enviar-btn" id="env-correo">Enviar Formato</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="popup-modal-{{$empleado->nuM_EMPL}}" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                                                    <div class="relative w-full max-w-md p-4">
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal-{{$empleado->nuM_EMPL}}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Cerrar Modal</span>
                                                            </button>
                                                            <div class="p-4 text-center md:p-5">
                                                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Esta seguro de eliminar este registro</h3>
                                                                <a href="{{route('empleados.delete', ['nEmpleado' => $empleado->nuM_EMPL])}}" data-modal-hide="popup-modal-{{$empleado->nuM_EMPL}}" type="button" class=" cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" id="delete">
                                                                    Si, Estoy Seguro
                                                                </a>
                                                                <button data-modal-hide="popup-modal-{{$empleado->nuM_EMPL}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                         @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <div class="flex items-center justify-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="text-center">
                                            <span class="font-medium">Alerta Informativa!</span> No hay empleados modificados.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{ $empleados->links() }}
                    </div>

                    <div id="loader" class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full bg-black bg-opacity-75">
                        <x-loaderComponent />
                    </div>
                </x-container>
            </div>
        </div>
    </div>




    @push('js')
    <script src="{{asset('js/loaderEmail.js')}}"></script>
        @if ($empleados->isNotEmpty())
        <script src="{{asset('js/modal.js')}}"></script>
        <script src="{{asset('js/dropZone.js')}}"></script>
        <script src="{{asset('js/validationEmail.js')}}"></script>
        <script src="{{asset('js/busquedaKeyUp.js')}}"></script>

        @endif
    @endpush

</x-app-layout>
