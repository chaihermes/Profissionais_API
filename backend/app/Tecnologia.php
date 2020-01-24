<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $table = "tecnologias";

    //função de relacionamento:
    public function profissionais(){
        return $this->belongsToMany('App\Profissional', 'profissionais_tecnologias', 'tecnologias_id', 'profissionais_id');
        //return $this->belongsToMany(Profissional::class); Duas maneiras de escrever.
        //Primeiro conecta a FK do que está e depois o outro que vai conectar.
    } 
}
