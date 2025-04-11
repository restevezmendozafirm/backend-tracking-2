<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClienteConfirmacion;
use Illuminate\Support\Facades\DB;

class ConfirmacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function index(Request $request)
    {

        // Obtiene el valor del parámetro "perPage" de la URL
        $perPage = $request->input('perPage', 10); // 10 registros por página por defecto
        if ($perPage == 'all') {
            // Si se selecciona "Todos", se obtienen todos los registros
            $clientesPotenciales = ClienteConfirmacion::select('campos_cli', 'update_cli', 'create_cli')
            ->orderBy('update_cli', 'desc')
            ->paginate(PHP_INT_MAX);

        } else {
            // De lo contrario, se paginan los resultados según la cantidad seleccionada
            $clientesPotenciales = ClienteConfirmacion::select('campos_cli', 'update_cli', 'create_cli')
            ->orderBy('update_cli', 'desc')
            ->paginate($perPage);

        }

        $totalRegistros = $clientesPotenciales->total();
        return view('clientes_inmigracion')->with([
            "globalData" => collect([
                'user' => Auth::user(),
                'clientesPotenciales' => $clientesPotenciales,
                'totalRegistros' => $totalRegistros, // Pasa el total de registros a la vista
            ])
        ]);
    }
}
