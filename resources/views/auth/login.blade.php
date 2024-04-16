<x-guest-layout>
    <x-authentication-card class="max-w-lg"> <!-- Ajusta el ancho máximo del card -->
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex justify-center items-center flex-col lg:flex-row"> <!-- Centra el contenido y cambia a columna en dispositivos pequeños -->
                <div>
                    <img src="{{ asset('img/enrolamiento.png') }}" alt="enrolamiento imagen" class="img-size-lg">
                </div>

                <div class="mt-4 lg:mt-0 lg:ml-4"> <!-- Ajusta el margen y la posición de los elementos en pantallas mayores a lg -->
                    <div class="mb-5">
                        <h1>Si no tienes una cuenta da <a class="text-teal-600" href="{{route('register')}}">"click aqui"</a></h1>
                    </div>
                    <div>
                        <x-label for="n_empleado" value="{{ __('N° Empleado') }}" />
                        <x-input id="n_empleado" class="block mt-1 w-full" type="number" name="n_empleado" :value="old('n_empleado')" required autofocus autocomplete="n_empleado" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </div>



        </form>
    </x-authentication-card>
</x-guest-layout>
