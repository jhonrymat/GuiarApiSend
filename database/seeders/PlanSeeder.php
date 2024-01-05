<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planes = [
            [
                'nombre' => 'Esensial',
                'precio' => '29',
                'tipo' => 'Mensual',
                'paypalId' => 'P-1FU20713BS0866046MWIKCVI',
                'paypaProductolId' => 'PROD-4G9695609J468880H',
            ],
            [
                'nombre' => 'Esensial',
                'precio' => '299',
                'tipo' => 'Anual',
                'paypalId' => 'P-184847468C0785708MWIKDII',
                'paypaProductolId' => 'PROD-4G9695609J468880H',
            ],
            [
                'nombre' => 'Profesional',
                'precio' => '45',
                'tipo' => 'Mensual',
                'paypalId' => 'P-0YE8071312446352SMWIJ3RQ',
                'paypaProductolId' => 'PROD-7UE26677626820702',
            ],
            [
                'nombre' => 'Profesional',
                'precio' => '480',
                'tipo' => 'Anual',
                'paypalId' => 'P-2SG95263AE4093434MWIJ5FQ',
                'paypaProductolId' => 'PROD-7UE26677626820702',
            ],
            [
                'nombre' => 'Plus',
                'precio' => '99',
                'tipo' => 'Mensual',
                'paypalId' => 'P-8BL42385GC7113633MWIKICQ',
                'paypaProductolId' => 'PROD-6GU69134D2594171D',
            ],
            [
                'nombre' => 'Plus',
                'precio' => '899',
                'tipo' => 'Anual',
                'paypalId' => 'P-5RP936075X2548443MWIKJDQ',
                'paypaProductolId' => 'PROD-6GU69134D2594171D',
            ],
        ];

        // Inserta los datos en la tabla 'plans'
        DB::table('plans')->insert($planes);
    }
}
