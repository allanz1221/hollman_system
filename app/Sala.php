<?php

namespace App;
use App\Empresa;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //
    protected $table = "salas";
    protected $fillable = ['nombre', 'empresa_id','temperatura','t_mas','t_menos'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
