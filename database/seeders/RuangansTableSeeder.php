<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class RuangansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruangan = [
            [
                'name' => 'Sidang 1 Dekanat',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Sidang 2 Dekanat',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Meeting Lt. 2 Lab Farmaka Tropis',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ];

        Ruangan::insert($ruangan);
    }
}
