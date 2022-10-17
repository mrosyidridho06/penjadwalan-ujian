<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;

class DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $user = User::insert([
            [
            'name' => 'Fika Aryanti, M.Farm., Apt',
            'email' => 'fika@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Prof. Dr. H. Laode Rijai, M.Si',
            'email' => 'laode@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Herman, M.Si',
            'email' => 'herman@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Rolan Rusli, M.Si',
            'email' => 'rolan@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Fajar Prasetya, S.Farm., M.Si., Apt., Ph.D',
            'email' => 'fajar@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Hadi Kuncoro, S.Farm., M.Farm., Apt',
            'email' => 'hadi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Yurika Sastyarina, S.Farm., M.Farm., Apt',
            'email' => 'yurika@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Angga Cipta Narsa, S.Farm., M.Si. Apt',
            'email' => 'angga@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Islamudin Ahmad, S.Si., M.Si., Apt',
            'email' => 'islamudin@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Niken Indriyanti, S.Farm., M.Si., Apt',
            'email' => 'niken@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Riski Sulistiarini, S. Farm., M.Si., Apt',
            'email' => 'riski@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Lizma Febrina, S.Pd., M.Sc',
            'email' => 'lizma@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Junaidin, SE., M.Si.',
            'email' => 'junaidin@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Supriatno, M.Si',
            'email' => 'supriatno@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dr. Helmi, S.Farm., Apt',
            'email' => 'helmi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Adam M. Ramadhan, S.Far., M.Sc., Apt',
            'email' => 'adam@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Sabaniah Indjar Gama, S.Si., M.Si',
            'email' => 'sabaniah@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Hajrah, S.Farm., M.Si., Apt',
            'email' => 'hajrah@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Juniza Firdha Suparningtyas, S.Si., M.Si',
            'email' => 'juniza@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Muhammad Faisal, S.Gz., M.Kes',
            'email' => 'faisal@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Satriani Badawi, S.Si., M.Kes',
            'email' => 'satriani@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Apt. Noviyanty I.G., S.Farm., M.Biomed',
            'email' => 'novianty@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'M. Arifuddin, S. Si., M. Si., Apt',
            'email' => 'arifuddin@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Febrina Mahmudah, M.Farm., Apt',
            'email' => 'febrian@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Novita Eka Khartab, M.Farm., Apt',
            'email' => 'novita@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dewi Mayasari, M.Farm., Apt',
            'email' => 'dewi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Dwi Elfira Kurniati, S.Farm, M.S.Farm',
            'email' => 'dwi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Erwin Samsul, M.Si., Apt',
            'email' => 'erwin@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Vita Olivia Siregar, S.Farm., M.S.Farm',
            'email' => 'vita@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Andi Tenri Kawareng, S.Gz., MPH',
            'email' => 'andi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Hifdzur Rashif Rija`I, S.Farm., M.Sc.Pharm., Apt',
            'email' => 'hifdzur@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Ummi Khuzaimah, S.Gz., M.Si',
            'email' => 'ummi@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Nur Rezky Khairun Nisaa, S.Farm., M.Si',
            'email' => 'nur@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Mentarry Bafadal, S.Farm., M.Sc',
            'email' => 'mentarry@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Zulhaerana Bahar, S.Farm., M.Si., Apt',
            'email' => 'zulhaerana@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Raisa Fadilla, M.Farm',
            'email' => 'raisa@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Venna Sinthary, M.S.Farm',
            'email' =>'venna@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Arman Rusman, M.Pharm.Sci',
            'email' => 'arman@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Abdul Rahim, S.Farm., M.Farm',
            'email' => 'abdul@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Muhammad Nuzul Azhim Ash Siddiq, S.Gz., M.Si',
            'email' => 'nuzul@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Fahrul Rozi, S.Gz., M.Si.',
            'email' => 'fahrul@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Karera Aryatika, S.Gz., M.Gizi',
            'email' => 'karera@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Faizatun Maulida, M.Farm',
            'email' => 'faizatun@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Nurus Sobah, S.Farm., M.Farm.Klin., Apt',
            'email' => 'nurus@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Hery Kurniawan, S.Farm., M.Farm.Klin., Apt',
            'email' => 'hery@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Siti Rouchmana, M.Clin.Pharm',
            'email' => 'siti@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Onny Ziasti Fricillia, M.Farm.Klin',
            'email' => 'onny@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Leny Eka Tyas Wahyuni, S.Gz., M.Si',
            'email' => 'leny@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Nurul Muhlisa Mus, S.Farm., M.Si',
            'email' => 'nurul@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Maryam Jamila Arief, M.S.Farm',
            'email' => 'maryam@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Baso Didik Hikmawan, M.Pharm.Sci',
            'email' => 'baso@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Barolym Tri Pamungkas, S.Farm., M.Farm., Apt',
            'email' => 'barolym@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Ika Wirya Wirawanti, S.Gz., M.Si',
            'email' => 'ika@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Chaidir Masyhuri Majiding, S.Gz., M.Si',
            'email' => 'chaidir@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Indria Pijaryani, M.Gz',
            'email' => 'indria@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Riki, S.Si., M.Si',
            'email' => 'riki@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
            [
            'name' => 'Jamil Anshory, S.K.M., M.Si',
            'email' => 'jamil@lecturer.unmul.ac.id',
            'password' => Hash::make('password'),
            'last_login_at' => null,
            'last_login_ip' => null,
            'role' => 'dosen'
            ],
        ]);
        // Dosen::create([
        //     'nip' => $faker->unique()->isbn10,
        //     'alamat' => $faker->address,
        //     'jabatan' => 'Dosen',
        //     'user_id' => $user->id,
        // ]);
        $user_ids = User::where('role', 'dosen')->pluck('id')->toArray();

            $finalArray = array();
                foreach($user_ids as $key => $value){
                    array_push($finalArray, array(
                        'nip' => $faker->unique()->isbn10,
                        'alamat' => $faker->address,
                        'jabatan' => 'Dosen',
                        'user_id' => $user_ids[$key],
                        "created_at"=> Carbon::now(),
                        "updated_at"=> Carbon::now()
                    )
                );
            }

        Dosen::insert($finalArray);
    }
}
