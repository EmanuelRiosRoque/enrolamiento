<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nuevo Inmueble') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-container>
                    <a  href="{{route('update.index', ['data'=>json_encode($data)])}}" class="cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn"><i class="text-white fa-solid fa-backward-step"></i> Regresar al Empleado</a>
                    <div class="p-6">
                        <form method="POST" action="{{route('inmuebles.create',['data'=>json_encode($data)])}}" class="max-w-md mx-auto">
                            @csrf
                            
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="new_inmubueble" id="floating_descriP" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required />
                                <label for="floating_descriP" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nuevo Inmueble</label>
                            </div>
                            <button type="submit" class="w-full cursor-pointer text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="enviar-btn">Crear Inmueble</button>
                        </form>
                    </div>
                </x-container>
            </div>
        </div>
    </div>
</x-app-layout>