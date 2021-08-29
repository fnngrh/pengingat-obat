<?php

use Illuminate\Database\Seeder;
use App\MinumObat;

class MinumObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'id_obat_resep' => 1,
            ],
            [
                'id_obat_resep' => 2,
            ],
            [
                'id_obat_resep' => 3,
            ],
            [
                'id_obat_resep' => 4,
            ]
        ];

            MinumObat::insert($data);
    }
}
