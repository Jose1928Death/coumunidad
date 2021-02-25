<?php

namespace Database\Seeders;

use App\Models\Propiedad;
use Illuminate\Database\Seeder;

class PropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propiedad::create([
            'nombre'=>'CalleA',
            'piso'=>2
        ]);
        Propiedad::create([
            'nombre'=>'CalleB',
            'piso'=>3
        ]);
        Propiedad::create([
            'nombre'=>'CalleC',
            'piso'=>1
        ]);
        Propiedad::create([
            'nombre'=>'CalleD',
            'piso'=>5
        ]);
        Propiedad::create([
            'nombre'=>'CalleE',
            'piso'=>7
        ]);
    }
}
