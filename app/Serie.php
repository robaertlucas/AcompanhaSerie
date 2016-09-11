<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['id', 'serie', 'descricao'];
   public function curso()
{
     return $this->hasMany("App\Episodio");
}
}
