<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProceso extends Model
{
   public function etapas(){
       return $this->hasMany('App\Etapa');
   }

    public function proceso_contractuals(){
        return $this->hasMany('App\ProcesoContractual');
    }
}
