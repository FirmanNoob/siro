<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin Operator',
                'email' => 'operator@op.com',
                'role' => 'operator',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'Peserta 1',
                'email' => 'peserta@gmail.com',
                'role' => 'peserta',
                'password' => bcrypt('peserta')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
