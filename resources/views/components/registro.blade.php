<div id="timeline-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 flex flex-col items-center justify-center hidden w-full h-screen overflow-x-hidden overflow-y-auto md:inset-0">
    <!-- Fondo semitransparente -->
    <div class="fixed top-0 bottom-0 left-0 right-0 bg-black opacity-50"></div>
    <!-- Contenido del modal -->
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
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
            <div class="p-4 px-5 md:p-5">
                <ol class="relative border-gray-200 border-s ">
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 -start-3 ring-8 ring-white ">
                            <i class="text-amber-800 fa-regular fa-calendar-days"></i>
                        </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 ">Registro Creado: {{$empleado->created_at->diffForHumans()}}</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-amber-800 ">{{$empleado->created_at->isoFormat('LL')}}</time>
                        <p class="mb-4 text-base font-normal text-gray-500 ">Registro Creado hace referencia a la fecha de actualizacion del formato</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 -start-3 ring-8 ring-white ">
                            <i class="text-amber-800 fa-solid fa-keyboard"></i>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Elaborado</h3>
                        <p class="mb-4 text-base font-normal text-gray-500 ">Este elemento fue elaborado y modificado por: <span class="text-amber-800">{{$empleado->user->name}}</span></p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 -start-3 ring-8 ring-white ">
                            <i class="text-amber-800 fa-solid fa-envelope-open"></i>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Correo(s) receptor</h3>
                        @if ($correos->isNotEmpty())
                        <ul class="list-disc">
                            @foreach ($correos as $correo)
                                <li class="mb-4 text-base font-normal text-amber-800">{{$correo->emailResptor}}
                                    <br>  <span class="text-sm font-bold text-amber-500">{{$correo->created_at->diffForHumans()}}</span>
                                    <br>  <span class="text-sm font-bold text-amber-400">{{$correo->created_at->isoFormat('LL')}}</span>
                                </li>

                            @endforeach
                        </ul>
                        @else
                            <p class="mb-4 text-base font-normal text-amber-700">Aun no hay correo(s) receptores</p>
                        @endif
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 -start-3 ring-8 ring-white ">
                            <i class="text-amber-800 fa-solid fa-envelope-open"></i>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Documento enviado</h3>
                        @if ($correos->isNotEmpty())
                        <ul class="list-disc">
                            @foreach ($correos as $correo)
                                <li class="mb-4 text-base font-normal text-amber-800">
                                    <a href="{{ asset('pdf/' . $correo->nombreDocumento . '.pdf') }}" target="_blank">{{ $correo->nombreDocumento }}</a>
                                    <br>
                                    <span class="text-sm font-bold text-amber-500">{{ $correo->created_at->diffForHumans() }}</span>
                                    <br>
                                    <span class="text-sm font-bold text-amber-400">{{ $correo->created_at->isoFormat('LL') }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @else
                            <p class="mb-4 text-base font-normal text-amber-700">Aun no hay documento enviado</p>
                        @endif
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

