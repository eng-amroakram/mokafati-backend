<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0599916671',
            'username' => 'admin',
            'status' => 'active',
            'address' => 'Palestine/Gaza',
        ]);
        $store = User::create([
            'name' => 'store',
            'email' => 'store@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0599916672',
            'username' => 'store',
            'status' => 'active',
            'address' => 'Palestine/Gaza',
        ]);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0599916674',
            'username' => 'user',
            'status' => 'active',
            'address' => 'Palestine/Gaza',
        ]);

        $admin->assignRole('admin');
        $store->assignRole('store_owner');
        $user->assignRole('user');
    }
}
