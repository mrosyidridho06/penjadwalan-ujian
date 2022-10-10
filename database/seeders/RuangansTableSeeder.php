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
                'name' => 'KF1',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'KF2',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'KF3',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'KF4',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ];

        Ruangan::insert($ruangan);
    }
}
