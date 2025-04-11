<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePotencialDazn extends Model
{
    // Nombre de la tabla en la base de datos (opcional si sigue la convención de nombres)
    protected $table = 'clientes_potenciales_dazn';

    // Nombre de la clave primaria (opcional si sigue la convención de nombres)
    protected $primaryKey = 'id_cli';

    // Otros atributos y métodos personalizados, como relaciones, pueden ir aquí
}
