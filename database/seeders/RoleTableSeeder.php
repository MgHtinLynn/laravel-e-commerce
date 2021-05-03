<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator Roles
        $superAdministrator = Role::create([
            'guard_name' => 'admin',
            'display_name' => "Super Administrator",
            'name' => "super-admin"
        ]);

        Permission::create([
            'guard_name' => 'admin',
            'display_name' => "Admin Management",
            'name' => "admin-management"
        ]);

        Permission::create([
            'guard_name' => 'admin',
            'display_name' => "Item Management",
            'name' => "item-management"
        ]);


        Permission::create([
            'guard_name' => 'admin',
            'display_name' => "Customer Management",
            'name' => "customer-management"
        ]);

        Permission::create([
            'guard_name' => 'admin',
            'display_name' => "Transactions Management",
            'name' => "transactions-management"
        ]);

        $superAdministrator->syncPermissions(["admin-management","item-management","customer-management","transactions-management"]);

    }
}
