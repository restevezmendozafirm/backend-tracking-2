@extends('layouts.main')

@section('content')
    <div class="container mx-auto sm:px-4">
        <h2 class="text-3xl mt-8 mb-4 text-center uppercase tracking-widest font-sans font-extrabold">
            {{ __('Crear cuenta') }}
        </h2>
        <div class="mt-8 mb-16 flex flex-wrap  justify-center">
            <div class="md:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">{{ __('Registro') }}
                    </div>

                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="flex flex-wrap  mb-3">
                                <label for="name"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Nombre') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="name" type="text"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('name') bg-red-700 @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap  mb-3">
                                <label for="last"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Apellido') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="name" type="text"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('name') bg-red-700 @enderror"
                                        name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                    @error('lname')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input nuevo: avatar -->
                            <div class="flex flex-wrap  mb-3">
                                <label for="avatar"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Foto de perfil') }}</label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="avatar" type="file"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('avatar') bg-red-700 @enderror"
                                        name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" autofocus>

                                    @error('avatar')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- / Input nuevo: avatar -->

                            <div class="flex flex-wrap  mb-3">
                                <label for="email"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Correo electrónico') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="email" type="email"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('email') bg-red-700 @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap  mb-3">
                                <label for="password"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Contraseña') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="password" type="password"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('password') bg-red-700 @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap  mb-3">
                                <label for="password-confirm"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Confirmar contraseña') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="password-confirm" type="password"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="flex flex-wrap  mb-3">
                                <label for="phone"
                                    class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-end">{{ __('Teléfono Celular') }}<span
                                        class="text-red-500">&nbsp;*</span></label>

                                <div class="md:w-1/2 pr-4 pl-4">
                                    <input id="phone" type="phone"
                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('phone') bg-red-700 @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="hidden mt-1 text-sm text-red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap  mb-0">
                                <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                    <button type="submit"
                                        class="btn-blue rounded-lg py-2 px-6 user-registration-btn uppercase font-bold tracking-wide text-white font-sans hover:scale-110 transition-all">{{ __('Crear cuenta') }}</button>
                                </div>
                            </div>
                            <p class="text-center">Campos marcados con <span class="text-red-500">&nbsp;*</span>&nbsp;son
                                obligatorios</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
