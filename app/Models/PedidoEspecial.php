<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoEspecial extends Model
{
    use HasFactory;

    protected $table = 'pedido_especiales'; // Especificamos el nombre correcto de la tabla

    protected $fillable = [
        'nombre',
        'contacto',
        'descripcion',
        'fecha_deseada',
        'imagen',
        'estado',
        'tiempo_estimado',
    ];
}
