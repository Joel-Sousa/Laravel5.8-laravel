<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    use HasFactory;

    protected $table = 'desenvolvedores';
    protected $primaryKey = 'idDesenvolvedor';
    
    protected $fillable = [
        'nome',
        'cargo',
    ];

    public function projeto(){
        // return $this->belongsToMany(Projeto::class, 'alocacoes', 'idAlocacao' , 'idProjeto');
        // return $this->belongsToMany(Projeto::class, Alocacao::class, 'idAlocacao' , 'idProjeto');
        
        // return $this->belongsToMany(Projeto::class, 'alocacoes', 'idProjeto', 'idAlocacao');
        // return $this->belongsToMany(Projeto::class, Alocacao::class, 'idProjeto', 'idAlocacao');

        return $this->belongsToMany(Projeto::class, Alocacao::class, 'idProjeto', 'idAlocacao')->withPivot('horasSemanais');
    }
}
