<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProdisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
                'jurusan' => 'Sarjana Farmasi',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'jurusan' => 'Sarjana Farmasi Klinis',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ];
        Prodi::insert($prodi);
    }
}
