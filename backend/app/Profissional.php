<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = "profissionais";

    //public $timestamps = false;   Se nâo tiver timestamps na tabela original no BD.
    public function tecnologias(){
        return $this->hasMany('App\Tecnologia', 'profissionais_tecnologias', 'profissionais_id', 'tecnologias_id');
        //return $this->belongsToMany(Profissional::class); Duas maneiras de escrever.
        //Primeiro conecta a FK do que está e depois o outro que vai conectar.
    } 
}
