<?php

use Illuminate\Database\Seeder;
use App\Obat;
class ObatSeeder extends Seeder
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
                'nama_obat' => 'Paracetamol Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025501',
                'satuan' => 'ml',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Komik Sirup ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025511',
                'satuan' => 'mg',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Paramex Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025521',
                'satuan' => 'ml',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Panadol Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025531',
                'satuan' => 'ml',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Contrexyn Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025541',
                'satuan' => 'ml',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Antimo Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025551',
                'satuan' => 'mg',
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],



            
        ];
          Obat::insert($data);
    }
}
