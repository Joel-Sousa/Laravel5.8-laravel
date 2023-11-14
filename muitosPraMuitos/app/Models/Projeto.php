<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';
    protected $primaryKey = 'idProjeto';

    protected $fillable = [
        'nome',
        'estimativaHoras',
    ];

    public function desenvolvedor(){
        return $this->belongsToMany(Desenvolvedor::class, Alocacao::class, 'idDesenvolvedor', 'idAlocacao')->withPivot('horasSemanais');
    }
}
