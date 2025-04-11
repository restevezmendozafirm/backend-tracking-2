@extends('layouts.main')

@section('content')
<div class="back-login">
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap justify-center backend-box">
            <div class="md:w-3/3 pr-4 pl-4">
                <div
                class="caja-sesion rounded-t-lg mt-8 mb-16 relative flex flex-col min-w-0 rounded break-words border border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 border-b-1 border-gray-300 text-gray-900">
                    <span class="cintillo-rojo"></span>
                    <img class="logo" src="https://mendozafirm.com/wp-content/themes/Tema/_assets/public/images/logo.webp" alt="logo">
                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex flex-wrap mb-3 rounded-b-lg">
                                <label for="email"
                                    class="md:w-1/2 pr-4 text-left text-white pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Correo electrónico') }}</label>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="email" type="email"
                                        class="@error('email') is-invalid outline-red-500 @enderror rounded-md block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal text-gray-800 border border-gray-200 bg-white"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="mt-1 text-sm text-white"
                                            role="alert"><strong>{{ __('Credenciales Incorrectas') }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-3">
                                <label for="password"
                                    class="md:w-1/2 px-4 text-left text-white py-2 mb-0 leading-normal text-md-end">{{ __('Contraseña') }}</label>
                                <div class="md:w-1/2 px-4 ">
                                    <input id="password" type="password"
                                        class="@error('password') is-invalid outline-red-500 @enderror rounded-md block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="mt-1 text-sm text-white"
                                            role="alert"><strong>{{ __('Credenciales Incorrectas') }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-2">
                                <div class="md:w-1/2 px-4 md:mx-1/3">
                                    <div class="relative block mb-2">
                                        <input class="rounded absolute mt-1" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="text-white pl-6 mb-0"
                                            for="remember">{{ __('Recordar usuario') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-0 justify-center">
                                <div class="md:w-2/3 px-4 md:mx-1/3">
                                    <button type="submit"
                                        class="btn-red btn-sesion border-none inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-white hover:bg-blue-600 bg-blue-500">{{ __('Inicia Sesión') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
