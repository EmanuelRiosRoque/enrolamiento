<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Modificar empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-container>
                    <a  href="{{route('dashboard')}}" class="cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn"><i class="text-white fa-solid fa-backward-step"></i> Regresar</a>

                    <div class="p-6">
                        <form method="POST" action="{{ route('update.update', ['id' => $data['nuM_EMPL']]) }}" class="max-w-md mx-auto">
                            @csrf
                            <div class="grid md:grid-cols-3 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text"  name="nombres" id="floating_nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['nombres']}}" />
                                    <label for="floating_nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text"  name="apellidop" id="floating_apellidoP" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['apellidop']}}" />
                                    <label for="floating_apellidoP" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellido Paterno</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text"  name="apellidom" id="floating_apellidoM" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['apellidom']}}" />
                                    <label for="floating_apellidoM" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellido Materno</label>
                                </div>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="descripcioN_PUESTO" id="floating_descriP" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['descripcioN_PUESTO']}}" />
                                <label for="floating_descriP" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Puesto</label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="plaza" id="floating_plaza" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['plaza']}}" />
                                <label for="floating_plaza" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plaza</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="rfc" id="floating_RFC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['rfc']}}"/>
                                <label for="floating_RFC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RFC</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="curp" id="floating_repeat_CURP" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['curp']}}"/>
                                <label for="floating_repeat_CURP" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CURP</label>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="areA_ADSCRIPCION" id="floating_area" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required disabled />
                                    <label for="floating_area" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Area</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <select name="descripcioN_AREA_ADSCRIPCION" id="floating_areaAdscrito" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" required>
                                        <option value="" disabled selected>Inmueble</option>
                                        @foreach($inmuebles as $inmueble)
                                            <option value="{{ $inmueble->id_locacion }}">{{ $inmueble->desc_locacion }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floating_areaAdscrito" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Area adscrito</label>
                                </div>
                                <input type="hidden" id="hidden_areaAdscrito" name="hidden_areaAdscrito">

                                {{-- Ruta para agregar nuevo inmueble --}}
                                {{-- <div>
                                    <a href="{{route('inmuebles.index', ['data' => json_encode($data)])}}" id="btn-newInmueble" class="cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">+ Inmueble</a>
                                </div> --}}
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="puesto" id="floating_puesto" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['puesto']}}" />
                                    <label for="floating_puesto" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Puesto</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="ubicacioN_AREA_TRABAJO" id="floating_ubicacion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['ubicacioN_AREA_TRABAJO']}}" />
                                    <label for="floating_ubicacion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ubicacion area de trabajo</label>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text"  name="descripcioN_AREA_TRABAJO" id="floating_descripcion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['descripcioN_AREA_TRABAJO']}}" />
                                    <label for="floating_descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripcion area de trabajo </label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text"  name="nivel" id="floating_nivel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required value="{{$data['nivel']}}" />
                                    <label for="floating_nivel" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nivel</label>
                                </div>
                            </div>
                            <button type="submit" class="w-full cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn">Guardar Cambios</button>
                        </form>
                    </div>
                </x-container>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        var inmuebles = {!! json_encode($inmuebles) !!};
    </script>
        <script src="{{asset('js/aregloAsociativo.js')}}"></script>

        <script>
           document.getElementById('floating_areaAdscrito').addEventListener('change', function() {
        var selectedIndex = this.selectedIndex;
        var selectedOption = this.options[selectedIndex];
        var selectedText = selectedOption.textContent;
        document.getElementById('hidden_areaAdscrito').value = selectedText;
    });
        </script>
    @endpush
</x-app-layout>
