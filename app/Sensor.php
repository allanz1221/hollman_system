<?php

namespace App;
use App\Sala;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //
    protected $table = "sensores";
    protected $fillable = ['nombre', 'sala_id'];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
