<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Esensial',
                'paypalProductoId' => 'PROD-4G9695609J468880H',
                'PrecioMensual'=> '29',
                'PrecioAnual'   => '299',
            ],
            [
                'nombre' => 'Profesional',
                'paypalProductoId' => 'PROD-7UE26677626820702',
                'PrecioMensual'=> '45',
                'PrecioAnual'   => '480',
            ],
            [
                'nombre' => 'Plus',
                'paypalProductoId' => 'PROD-6GU69134D2594171D',
                'PrecioMensual'=> '99',
                'PrecioAnual'   => '899',
            ],
        ];

        // Inserta los datos en la tabla 'plans'
        DB::table('productos')->insert($productos);
    }
}
