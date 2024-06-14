<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Actualizar Empleado enrolado') }}
        </h2>
        {{-- <div class="mt-4 text-blue-600">
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="text-lg">
                    <span class="font-bold">Recuerda !</span> solo actualizar lo necesario. Si un campo es correcto,  <span class="font-bold">no modificar.</span>
                </div>
            </div>
        </div> --}}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-container>
                    @if (session('success'))
                    <div class="mt-4 text-green-600">
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Exito!</span> {{ session('success') }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{route('modifica.search')}}" class="max-w-md mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                <svg class="w-4 h-4 text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" wire:model="numeroEmpleado" id="numeroEmpleado" name="numeroEmpleado" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-teal-500 focus:border-teal-500" placeholder="Buscar empleado por número"/>
                            @error('numeroEmpleado') <span class="text-red-500">{{ $message }}</span> @enderror
                            <button type="submit" class="text-white absolute end-1.5 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
                        </div>
                    </form>

                    @if (session('empleado'))
                        @php
                            $empleado = session('empleado');
                            $inmuebles = session('inmuebles');
                        @endphp
                        <div class="mt-4">
                            <!-- Mostrar detalles del empleado aquí -->
                            <form method="POST" action="{{ route('modifica.update', ['nEmpleado' => $empleado->nuM_EMPL]) }}" class="max-w-md mx-auto">
                                @csrf
                                @method('PUT')

                                @if ($errors->any())
                                    <div class="mb-2 alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.5 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                    </svg>
                                                    <span class="sr-only">Info</span>
                                                    <div>
                                                        <span class="font-medium">Verifica!</span> {{$error}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <h2 class="text-lg font-bold">Empleado encontrado:</h2>
                                    <p><strong>Nombre:</strong> {{ $empleado->nombres }} {{$empleado->apellidop}} {{$empleado->apellidom}}</p>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="numeroT" id="floating_nuTarje" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{ $empleado->n_tarjeta }}"/>
                                    <label for="floating_nuTarje" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Número tarjeta</label>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="horario" id="floating_horario" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{ $empleado->horario }}"/>
                                    <label for="floating_horario" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Horario</label>
                                </div>

                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="text" name="areA_ADSCRIPCION" id="floating_area" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required disabled value="{{ $empleado->descripcioN_AREA_ADSCRIPCION }}"/>
                                        <label for="floating_area" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Área</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select name="descripcioN_AREA_ADSCRIPCION" id="floating_areaAdscrito" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" required>
                                            <option value="" selected>Inmueble</option>
                                            <option selected value="{{ $empleado->descripcioN_AREA_ADSCRIPCION}}">{{$empleado->areA_ADSCRIPCION}}</option> -->
                                            @foreach($inmuebles as $inmueble)
                                                <option value="{{ $inmueble->id_locacion }}">{{ $inmueble->desc_locacion }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floating_areaAdscrito" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Área adscrito</label>
                                    </div>
                                    <input type="hidden" id="hidden_areaAdscrito" name="hidden_areaAdscrito" value="{{ $empleado->descripcioN_AREA_ADSCRIPCION }}">
                                    <input type="hidden" id="estatus" name="estatus" value="{{ $empleado->estatus }}">

                                    <input type="hidden" id="hidden_areaAdscrito" name="hidden_areaAdscritoDefault ">

                                    {{-- Ruta para agregar nuevo inmueble --}}
                                    {{-- <div>
                                        <a href="{{route('inmuebles.index', ['data' => json_encode($data)])}}"
                                            id="btn-newInmueble"
                                            class="cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">+
                                            Inmueble</a>
                                    </div> --}}
                                </div>

                                <button type="submit" class="w-full cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn">Guardar Cambios</button>
                            </form>
                        </div>
                    @endif
                </x-container>
            </div>
        </div>
    </div>

    @push('js')
        @if (isset($inmuebles) || isset($empleados))
            <script>var inmuebles = {!! json_encode($inmuebles) !!};</script>
            <script src="{{asset('js/aregloAsociativo.js')}}"></script>

            <script>
                function updateHiddenInput() {
                    var select = document.getElementById('floating_areaAdscrito');
                    var selectedIndex = select.selectedIndex;
                    var selectedOption = select.options[selectedIndex];
                    var selectedText = selectedOption ? selectedOption.textContent : '';
                    document.getElementById('hidden_areaAdscrito').value = selectedText || "{{ $empleado->descripcioN_AREA_ADSCRIPCION }}";
                }

                // Agregar evento de cambio al select
                document.getElementById('floating_areaAdscrito').addEventListener('change', updateHiddenInput);

                // Llamar a la función updateHiddenInput para establecer el valor inicial del input oculto
                updateHiddenInput();
            </script>
        @endif
    @endpush
</x-app-layout>
