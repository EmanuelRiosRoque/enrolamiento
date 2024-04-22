<div>
    <form wire:submit.prevent="fetchData" class="mb-5">
        <div class="relative z-0 w-96 mb-5">
            <input type="text" wire:model="nEmpleado" name="nEmpleado" id="nEmpleado" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-800 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " required maxlength="7" />
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ingrese Numero de Empleado</label>
        </div>
        <x-alert />

        <button type="submit" class="w-full w-auto  justify-center inline-flex items-center px-4 py-2 bg-teal-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:click="showLoader">
            {{ __('Buscar Empleado') }}   <i class="fa-solid fa-magnifying-glass text-white ml-2"></i>
        </button>
    </form>

    <div id="loader" class="flex justify-center mt-10 hidden" wire:loading.class.remove="hidden">
        <x-loaderComponent />
    </div>

    @if ($responseData)
        <div wire:loading.remove.delay="3000">
            <a href="{{ route('update.index', ['data' => json_encode($responseData)]) }}" class="justify-center inline-flex items-center px-4 py-2 bg-teal-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Editar Empleado
            </a>

            @include('busqueda.show', ['empleado' => $responseData['empleado']])
        </div>
    @endif

    @if ($error)
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">Error!</span> {{$error}}
            </div>
        </div>
    @endif

</div>



