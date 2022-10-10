<?php

namespace Database\Seeders;

use App\Models\Sesi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SesisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sesi = [
            [
                'sesi' => "Sesi 1",
                'jam_awal' => new Carbon('08:00:00'),
                'jam_akhir' => new Carbon('10:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'sesi' => "Sesi 2",
                'jam_awal' => new Carbon('10:30:00'),
                'jam_akhir' => new Carbon('12:30:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'sesi' => "Sesi 3",
                'jam_awal' => new Carbon('13:00:00'),
                'jam_akhir' => new Carbon('15:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'sesi' => "Sesi 4",
                'jam_awal' => new Carbon('15:30:00'),
                'jam_akhir' => new Carbon('17:30:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ];

        Sesi::insert($sesi);
    }
}
