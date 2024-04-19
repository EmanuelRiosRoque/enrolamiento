<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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

                    <div class="text-center text-4xl mb-4">
                        <h2>Lista de empleados modificados</h2>
                    </div>

                    <div class="mt-5">
                        @foreach ($empleados as $empleado)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
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
                                        <th scope="col" class="px-6 py-3">
                                            CURP
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Puesto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Plaza
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Generar Word
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white hover:bg-gray-50   ">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{$empleado->nuM_EMPL}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$empleado->nombres}} {{$empleado->apellidop}} {{$empleado->apellidom}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$empleado->rfc}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$empleado->curp}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$empleado->puesto}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$empleado->plaza}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a  href="{{route('download.documento', ["numeroEmpleado" => $empleado->nuM_EMPL])}}" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center cursor-pointer">
                                                <i class="fa-solid fa-file-word mr-2"></i>
                                                <span>Download</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>


                </x-container>
            </div>
        </div>
    </div>
</x-app-layout>
