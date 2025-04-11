@extends('layouts.main')

@section('content')
    <div class="bg-light-texture grid lg:grid-cols-1 md:grid-cols-1 xs:grid-flow-row sm:grid-flow-row">
        <div
            class="m-4">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                    <h1 class="text-6xl text-green-700 transition-all hover:text-green-900">
                        {{ __('Clientes Potenciales Landing DAZN') }}</h1>
                </div>
                <div class="flex-auto p-6">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                    @else
                        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800"
                            role="alert">
                            <h2 class="text-5xl">
                                {{ __('Bienvenido a tu cuenta, ') }} {{ Auth::user()->name }}
                            </h2>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="container mx-auto">
                <label for="searchInput">
                    Buscar Clientes:
                    <input type="text" class="mt-8 br-4" id="searchInput" placeholder="Buscar...">
                </label>
                <label for="filtroEnviado" class="ml-8">Filtrar por Estado:</label>
                <select id="filtroEnviadoDazn">
                    <option value="todos">Todos</option>
                    <option value="solo_enviado">Solo Enviados</option>
                    <option value="Enviado">Calificados</option>
                    <option value="no_enviado">No Enviados</option>
                    <option value="No Enviado">Potenciales Calificados</option>
                </select>
                <button id="downloadVisible" class="btn-green inline-block align-middle text-center select-none border mt-2.5 float-right whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-white hover:bg-blue-600 bg-blue-500 font-bold">Descargar Registros Visibles</button>
                <a href="https://mendozafirm.com/wp-content/plugins/descargar/descargar_clientes_potenciales_dazn.php" class="mr-8 btn-green inline-block align-middle text-center select-none border mt-2.5 float-right whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-white hover:bg-blue-600 bg-blue-500 font-bold">Descargar Registros</a><br>
                <br>
                <div class="inline-block">
                    <label for="fechaInicio">Rango fecha de Inicio:</label>
                    <input type="date" id="fechaInicio" class="mt-8 br-4" name="fechaInicio">
                    <label for="fechaFin" class="ml-8">Rango fecha Fin:</label>
                    <input type="date" id="fechaFin" class="mt-8 br-4" name="fechaFin">
                    <button id="filtrarPorFecha" class="ml-8 btn-green inline-block align-middle text-center select-none border mt-2.5 float-right whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-white hover:bg-blue-600 bg-blue-500 font-bold">Filtrar por Fecha</button>
                </div>
                <div id="totalRegistros" class="inline-block text-right my-2 float-right">
                    Cantidad de Registros: <span id="totalRegistrosNumero">{{ $globalData['totalRegistros'] }}</span>
                </div>
                <div class="bg-white shadow-md rounded my-6 overflow-auto caja-table">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th data-sort="correo" class="border px-4 py-2">Correo</th>
                                <th data-sort="nombre" class="border px-4 py-2">Nombre</th>
                                <th data-sort="apellido" class="border px-4 py-2">Apellido</th>
                                <th data-sort="apellido" class="border px-4 py-2">Contenido Dazn</th>
                                <th data-sort="apellido" class="border px-4 py-2">Registro Dazn</th>
                                <th data-sort="apellido" class="border px-4 py-2">Tiene Facebook</th>
                                <th data-sort="apellido" class="border px-4 py-2">Residente o Ciudadano</th>
                                <th data-sort="mismo_correo" class="border px-4 py-2">Mismo Correo</th>
                                <th data-sort="correo_opcional" class="border px-4 py-2">Correo Opcional</th>
                                <th data-sort="tel" class="border px-4 py-2">Teléfono Registrado</th>
                                <th data-sort="captura" class="border px-4 py-2">Captura Imagen</th>
                                <th data-sort="direccion" class="border px-4 py-2">Dirección</th>
                                <th data-sort="ciudad" class="border px-4 py-2">Ciudad</th>
                                <th data-sort="estado" class="border px-4 py-2">Estado</th>
                                <th data-sort="cp" class="border px-4 py-2">Código Postal</th>
                                <th data-sort="email_url" class="border px-4 py-2">Email Url</th>
                                <th data-sort="enviado" class="border px-4 py-2">Enviado</th>
                                <th data-sort="pid" class="border px-4 py-2">Pid</th>
                                <th data-sort="fecha" class="border px-4 py-2">Fecha de Creación</th>
                                <th data-sort="fechaact" class="border px-4 py-2">Fecha de Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($globalData['clientesPotenciales'] as $cliente)
                            @php
                                $json = json_decode($cliente->campos_cli, true);
                                $data_decode = json_decode($json, true);
                            @endphp
                                <tr data-envio="{{ $cliente->enviado_cli ? 'No Enviado' : 'Enviado' }}">
                                    <td class="border px-4 py-2" data-type="correo">{{$cliente->correo_cli}}</td>
                                    <td class="border px-4 py-2" data-type="nombre">{{ $cliente->nombre }}</td>
                                    <td class="border px-4 py-2" data-type="apellido">{{ $cliente->apellido }}</td>
                                    <td class="border px-4 py-2" data-type="dazn_conten">{{ $cliente->dazn_conten }}</td>
                                    <td class="border px-4 py-2" data-type="dazn_registered">{{ $cliente->dazn_registered }}</td>
                                    <td class="border px-4 py-2" data-type="face">{{ $cliente->has_facebook }}</td>
                                    <td class="border px-4 py-2" data-type="input_american">{{ $cliente->input_american }}</td>
                                    <td class="border px-4 py-2" data-type="mismo_correo">{{ $cliente->same_input }}</td>
                                    <td class="border px-4 py-2" data-type="correo_opcional">{{ $cliente->correo_opcional }}</td>
                                    <td class="border px-4 py-2" data-type="tel">{{ $cliente->inputtel }}</td>
                                    <td class="border px-4 py-2" data-type="captura">{!! $cliente->captura_imagen ? "<a href='https://mendozafirm.com/wp-content/themes/Tema/_template-pages/upload/$cliente->captura_imagen' target='_blank'>Click para ver la imagen</a>" : "No tiene imagen" !!}</td>                                    
                                    <td class="border px-4 py-2" data-type="direccion">{{ $cliente->address_cli }}</td>
                                    <td class="border px-4 py-2" data-type="ciudad">{{ $cliente->city }}</td>
                                    <td class="border px-4 py-2" data-type="estado">{{ $cliente->estado }}</td>
                                    <td class="border px-4 py-2" data-type="cp">{{ $cliente->posta_code }}</td>
                                    <td class="border px-4 py-2" data-type="email_url">{{ $cliente->email_get }}</td>
                                    <td class="border px-4 py-2" data-type="enviado">{{ $cliente->enviado_cli ? 'No Enviado' : 'Enviado' }}</td>
                                    <td class="border px-4 py-2" data-type="pid">{{ $cliente->pid_cli }}</td>
                                    <td class="border px-4 py-2" data-type="fecha">{{ $cliente->create_cli }}</td>
                                    <td class="border px-4 py-2" data-type="fechaact">{{ $cliente->update_cli }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                    <div id="noResultsMessage" style="display: none;">
                        No existen registros que coincidan con la búsqueda.
                    </div>
                </div>
                @if ($globalData['clientesPotenciales'] instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $globalData['clientesPotenciales']->links() }}
                @endif
                <br>
                <form class="text-center" method="GET" action="{{ route('home') }}">
                    <label class="text-lg" for="perPage">Registros por página:</label>
                    <select class="select-paginador" id="perPage" name="perPage">
                        <option value="10" {{ $globalData['clientesPotenciales']->perPage() == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ $globalData['clientesPotenciales']->perPage() == 20 ? 'selected' : '' }}>20</option>
                        <option value="30" {{ $globalData['clientesPotenciales']->perPage() == 30 ? 'selected' : '' }}>30</option>
                        <option value="40" {{ $globalData['clientesPotenciales']->perPage() == 40 ? 'selected' : '' }}>40</option>
                        <option value="50" {{ $globalData['clientesPotenciales']->perPage() == 50 ? 'selected' : '' }}>50</option>
                        <option value="60" {{ $globalData['clientesPotenciales']->perPage() == 60 ? 'selected' : '' }}>60</option>
                        <option value="70" {{ $globalData['clientesPotenciales']->perPage() == 70 ? 'selected' : '' }}>70</option>
                        <option value="80" {{ $globalData['clientesPotenciales']->perPage() == 80 ? 'selected' : '' }}>80</option>
                        <option value="90" {{ $globalData['clientesPotenciales']->perPage() == 90 ? 'selected' : '' }}>90</option>
                        <option value="100" {{ $globalData['clientesPotenciales']->perPage() == 100 ? 'selected' : '' }}>100</option>
                        <option value="500" {{ $globalData['clientesPotenciales']->perPage() == 500 ? 'selected' : '' }}>500</option>
                        <option value="all" {{ !in_array($globalData['clientesPotenciales']->perPage(), [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 500]) ? 'selected' : '' }}>Todos</option>
                    </select>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
