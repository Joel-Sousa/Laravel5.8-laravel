<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCliente';

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'idCliente',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
