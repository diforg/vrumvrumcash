<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    public function run(): void
    {
        if (User::count() === 0) {
            User::create([
                'name' => 'makon',
                'email' => 'makon@makon.com',
                'password' => Hash::make('makon@246'),
            ]);
        }
    }
}
