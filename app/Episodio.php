<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
  protected $fillable = ['id', 'episodio', 'conclusao', 'serie_id'];

  public function alunos()
{
return $this->belongsTo("App\Serie");
}
}
