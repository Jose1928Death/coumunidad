<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vecino extends Model
{
    use HasFactory;
    protected $fillable=['nombre','apellidos','email','foto'];

    public function propiedads(){
        return $this->belongsToMany('App\Models\Propiedad')
        ->withPivot('presupuesto')
        ->withTimestamps();
    }
    public function propiedadsOut(){
        $misPropiedads=$this->propiedads()->pluck('propiedads.id');
        $propiedadsOut=Propiedad::whereNotIn('id',$misPropiedads)->get();
        return $propiedadsOut;
    }

}
