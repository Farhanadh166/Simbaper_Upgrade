<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Buat 1 user admin untuk login pertama.
     * User ini akan mendapat id=1, sehingga otomatis
     * mendapat akses admin di KwitansiController dan template.
     */
    public function run(): void
    {
        $user = User::create([
            'name'        => 'Admin',
            'fullname'    => 'Administrator Simbaper',
            'username'    => 'admin',
            'nip'         => '000000000000000000',
            'organisasi'  => 'BPS Kota Padang Panjang',
            'unit_kerja'  => 'Pengelola Persediaan',
            'email'       => 'admin@simbaper.test',
            'password'    => Hash::make('password'),
        ]);

        // Buat personal team (wajib untuk Jetstream)
        $team = Team::forceCreate([
            'user_id'       => $user->id,
            'name'          => "Admin's Team",
            'personal_team' => true,
        ]);

        $user->current_team_id = $team->id;
        $user->save();
    }
}
