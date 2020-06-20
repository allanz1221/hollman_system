<?php

namespace App;
use App\User;
use App\Sala;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";
    protected $fillable = ['nombre', 'logo'];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function sala()
    {
        return $this->hasMany(Sala::class);
    }
}
