<?php

namespace App;
use App\Sensor;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registros";
    protected $fillable = ['sensor_id', 'temperatura'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

}
