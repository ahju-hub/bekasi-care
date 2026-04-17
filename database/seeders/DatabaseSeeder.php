<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bekasicare.test'],
            [
                'name' => 'Admin Bekasi Care',
                'password' => 'password123',
                'is_admin' => true,
            ],
        );

        User::updateOrCreate(
            ['email' => 'warga@bekasicare.test'],
            [
                'name' => 'Warga Bekasi',
                'password' => 'password123',
                'is_admin' => false,
            ],
        );
    }
}
