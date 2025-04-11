<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientePotencialDazn;
use Illuminate\Support\Facades\DB;

class ClientesDaznController extends Controller
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
            $clientesPotenciales = ClientePotencialDazn::select('correo_cli', 'dazn_registered', 'dazn_conten', 'has_facebook', 'input_american', 'nombre', 'apellido', 'same_input', 'correo_opcional', 'inputtel', 'captura_imagen', 'address_cli', 'city', 'estado', 'posta_code', 'campos_cli', 'email_get', 'enviado_cli', 'pid_cli', 'update_cli', 'create_cli')
            ->orderBy('update_cli', 'desc')
            ->paginate(PHP_INT_MAX);

        } else {
            // De lo contrario, se paginan los resultados según la cantidad seleccionada
            $clientesPotenciales = ClientePotencialDazn::select('correo_cli', 'dazn_registered', 'dazn_conten', 'has_facebook', 'input_american', 'nombre', 'apellido', 'same_input', 'correo_opcional', 'inputtel', 'captura_imagen', 'address_cli', 'city', 'estado', 'posta_code', 'campos_cli', 'email_get', 'enviado_cli', 'pid_cli', 'update_cli', 'create_cli')
            ->orderBy('update_cli', 'desc')
            ->paginate($perPage);

        }

        $totalRegistros = $clientesPotenciales->total();
        return view('dazn')->with([
            "globalData" => collect([
                'user' => Auth::user(),
                'clientesPotenciales' => $clientesPotenciales,
                'totalRegistros' => $totalRegistros, // Pasa el total de registros a la vista
            ])
        ]);
    }
}
