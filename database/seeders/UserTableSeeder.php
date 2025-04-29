<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create(
            [
                'name' => 'admin',
                'username' =>'admin',
                'email' => 'admin@gmail.com',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Cibaduyut',
                'notelp' => '089646328037',
                'password' => Hash::make('admin123'),
                'is_admin' => 1,
            ]
        );
    }
}
