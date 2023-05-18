<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
           'user_type_id'=>1,
           'email'=>'admin@email',
           'password'=>Hash::make(12345678),
       ]);

        User::create([
            'user_type_id'=>3,
            'email'=>'delivery@email',
            'password'=>Hash::make(12345678),
        ]);

        User::create([
            'user_type_id'=>2,
            'email'=>'warehouse@email',
            'password'=>Hash::make(12345678),
        ]);
    }
}
