<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::create([
            'owner_id' => 2,
            'name' => 'My Store',
            'commercial_registration' => "store-123",
            'tax_number' => '54',
            'type' => 'restaurant',
            'status' => 'active',
            'invoice' => 'invoice',
        ]);

        Employee::create([
            'name' => 'employee',
            'status' => 'active',
            'store_id' => $store->id,
        ]);
    }
}
