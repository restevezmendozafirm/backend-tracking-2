<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCalificado extends Model
{
    // Nombre de la tabla en la base de datos (opcional si sigue la convención de nombres)
    protected $table = 'clientes_pagos';

    // Nombre de la clave primaria (opcional si sigue la convención de nombres)
    protected $primaryKey = 'id';

    // Otros atributos y métodos personalizados, como relaciones, pueden ir aquí
}
