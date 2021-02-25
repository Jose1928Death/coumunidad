<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $fillable=['nombre','piso'];

    public function vecinos(){
        return $this->belongsToMany('App\Models\Vecino')
        ->withPivot('presupuesto')
        ->withTimestamps();
    }
    public function vecinosOut(){
        $misvecinos=$this->vecinos()->pluck('vecinos.id');
        $vecinosin=Vecino::whereNotIn('id',$misvecinos);
        return $vecinosin;
    }
}
