<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $storeEmployeeRole = Role::firstOrCreate(['name' => 'user']);
        $storeOwnerRole = Role::firstOrCreate(['name' => 'store_owner']);
        $storeEmployeeRole = Role::firstOrCreate(['name' => 'employee']);

        // Create Permissions
        $permissions = [
            'manage_users',
            'manage_stores',
            'manage_employees',
            'manage_packages',
            'manage_invoices',

            'view_dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([
            'manage_users',
            'manage_stores',
            'manage_packages',
            'manage_invoices',

            'view_dashboard',
        ]); // All Permissions to Admin
        $storeOwnerRole->givePermissionTo(['view_dashboard', 'manage_employees']);
        $storeEmployeeRole->givePermissionTo([]);
    }
}
