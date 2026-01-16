<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $staffRole = Role::where('name', 'staff')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('a123'),
        ]);
        $admin->roles()->attach($adminRole);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('m123'),
        ]);
        $manager->roles()->attach($managerRole);

        $staff1 = User::create([
            'name' => 'Staff One',
            'email' => 'staff1@example.com',
            'password' => Hash::make('s1123'),
        ]);
        $staff1->roles()->attach($staffRole);

        $staff2 = User::create([
            'name' => 'Staff Two',
            'email' => 'staff2@example.com',
            'password' => Hash::make('s2123'),
        ]);
        $staff2->roles()->attach($staffRole);
    }
}
