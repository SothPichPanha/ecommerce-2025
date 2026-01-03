<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff = Role::firstOrCreate(['name' => 'staff']);

        $allPermissions = Permission::all();
        $admin->permissions()->sync($allPermissions);

        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'products.update',
                'category.create',
                'category.update',
            ])->pluck('id')
        );

        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'category.create',
            ])->pluck('id')
        );
    }
}
