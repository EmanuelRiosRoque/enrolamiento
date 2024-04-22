<div class="w-full mt-10 shadow">
    <div class="overflow-hidden bg-white border rounded-lg shadow">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Empleado: {{$empleado['nuM_EMPL']}} - {{$empleado['descripcioN_PUESTO']}}
            </h3>
            <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Estatus: {{$empleado['estatus']}}
            </p>
            <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Informacion adicional del Empleado.
            </p>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nombre Completo
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['nombres'] ." ". $empleado['apellidop'] ." ". $empleado['apellidom']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        RFC <i class="text-teal-800 fa-regular fa-file"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['rfc']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        CURP <i class="text-teal-800 fa-regular fa-file"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['curp']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Area <i class="text-teal-800 fa-solid fa-location-dot"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['areA_ADSCRIPCION']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Area adscrito <i class="text-teal-800 fa-solid fa-location-dot"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['descripcioN_AREA_ADSCRIPCION']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Puesto <i class="text-teal-800 fa-solid fa-briefcase"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['puesto']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Ubicacion area de trabajo <i class="text-teal-800 fa-solid fa-location-dot"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['ubicacioN_AREA_TRABAJO']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Descripcion area de trabajo <i class="text-teal-800 fa-solid fa-briefcase"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['descripcioN_AREA_TRABAJO']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nivel <i class="text-teal-800 fa-solid fa-briefcase"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['nivel']}}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Plaza <i class="text-teal-800 fa-solid fa-briefcase"></i>
                    </dt>
                    <dd class="mt-1 text-sm text-center text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$empleado['plaza']}}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
