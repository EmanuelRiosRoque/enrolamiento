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
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert" id="success-alert">
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
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert" id="error-alert">
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
                                                <th scope="col" class="px-6 py-3">
                                                    Accion
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($empleados as $empleado)
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
                                                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="inline-flex items-center px-4 py-2 font-bold text-blue-900 bg-blue-500 rounded cursor-pointer hover:bg-blue-600" type="button">
                                                        <i class="mr-1 fa-solid fa-envelope"></i>
                                                        <span>Enviar correo</span>
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="inline-flex items-center px-4 py-2 font-bold text-red-900 bg-red-500 rounded cursor-pointer hover:bg-red-600" type="button">
                                                        <i class="mr-1 fa-solid fa-eraser"></i>
                                                        <span>Eliminar</span>
                                                    </button>
                                                </td>
                                            </tr>

                                                <x-registro :empleado="$empleado" :correos="$empleado->emailRegistros" />
                                                <x-sendEmail :empleado="$empleado" />
                                                <x-deletePopUp :empleado="$empleado" />
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
                </x-container>
            </div>
        </div>
    </div>




    @push('js')
        @if ($empleados->isNotEmpty())
        <script src="{{asset('js/modal.js')}}"></script>
        <script src="{{asset('js/dropZone.js')}}"></script>
        <script src="{{asset('js/validationEmail.js')}}"></script>
        <script src="{{asset('js/busquedaKeyUp.js')}}"></script>
        @endif
    @endpush

</x-app-layout>
