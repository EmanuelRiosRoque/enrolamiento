<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-container>
                    <div class="flex justify-end">
                        <a href="{{route('inmuebles.reset')}}" class="inline-flex items-center px-2 py-2 font-bold text-red-900 bg-red-500 rounded cursor-pointer hover:bg-red-600">
                            <i class="mr-1 fa-solid fa-backward"></i>
                            <span>Resetear</span>
                        </a>
                    </div>

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

                    <form action="" method="GET" class="max-w-md mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                <svg class="w-4 h-4 text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="searchInputInmuebles" name="term" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-teal-500 focus:border-teal-500" placeholder="Buscar empleado por número"/>
                        </div>
                    </form>
                    <div class="mt-5">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div id="listaEmpleados">
                                @if ($inmuebles->isNotEmpty())
                                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Inmueble
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Estatus
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Activar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inmuebles as $inmueble)
                                            <tr id="inmueble_{{$inmueble->desc_locacion}}" class="bg-white hover:bg-gray-50 ">

                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{$inmueble->id_locacion}}
                                                </th>
                                                <th scope="row" class="px-6 py-4">
                                                    {{$inmueble->desc_locacion}}
                                                </th>
                                                <th scope="row" class="px-6 py-4">
                                                    @if ($inmueble->estatus == 2)
                                                        <p class="text-red-500">Inmueble No Visible</p>
                                                    @else
                                                        <p class="tetx-green-500">Inmueble Visible</p>
                                                    @endif
                                                </th>

                                                <th scope="row" class="px-6 py-4">
                                                    <a  href="{{route('inmuebles.active', ['id_locacion' => $inmueble->id_locacion])}}" class="inline-flex items-center px-4 py-2 font-bold text-teal-900 bg-teal-500 rounded cursor-pointer hover:bg-teal-600">
                                                        <i class="mr-1 fa-solid fa-check"></i>
                                                        <span>ACTIVAR</span>
                                                    </a>
                                                </th>
                                            </tr>



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
                </x-container>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInputInmuebles'); // Corregido: searchInputInmuebles en lugar de searchInput
            const inmueblesRows = document.querySelectorAll('tr[id^="inmueble_"]');

            searchInput.addEventListener('input', function(event) {
                const searchTerm = event.target.value.trim().toLowerCase();

                inmueblesRows.forEach(function(inmuebleRow) {
                    const inmuebleData = inmuebleRow.textContent.toLowerCase();

                    if (inmuebleData.includes(searchTerm)) {
                        inmuebleRow.removeAttribute('hidden');
                    } else {
                        inmuebleRow.setAttribute('hidden', 'true');
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>


