<div id="timeline-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen flex flex-col">
    <!-- Fondo semitransparente -->
    <div class="fixed top-0 right-0 left-0 bottom-0 bg-black opacity-50"></div>
    <!-- Contenido del modal -->
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Informacion De Captura
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="timeline-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar Ventana Emergente</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 px-5">
                <ol class="relative border-s border-gray-200 ">
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 ">Registro Creado: {{$empleado->created_at->diffForHumans()}}</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 ">{{$empleado->created_at->isoFormat('LL')}}</time>
                        <p class="mb-4 text-base font-normal text-gray-500 ">Registro Creado hace referencia a la fecha de actualizacion del formato</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Elaborado por: {{$empleado->user->name}}</h3>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Al correo: {{$empleado->user->name}}</h3>
                    </li>
                    {{-- <li class="ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white ">
                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Flowbite Library v1.2.2</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 ">Released on December
                            2nd, 2021</time>
                        <p class="text-base font-normal text-gray-500 ">Get started with dozens of web components and
                            interactive elements built on top of Tailwind CSS.</p>
                    </li> --}}
                </ol>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{asset('js/loaderEmail.js')}}"></script>
@endpush
