<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage users',
            'manage doctors',
            'manage patients',
            'manage appointments',
            'view appointments',
            'create appointments',
            'cancel appointments',
            'manage own schedule',
            'view own appointments',
            'manage own profile',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => "web"
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $doctor = Role::firstOrCreate([
            'name' => 'Dcotor',
            'guard_name' => 'web'
        ]);

        $patient = Role::firstOrCreate([
            'name' => 'Patient',
            'guard_name' => 'web'
        ]);

        $admin->syncPermissions($permissions);


        $doctor->syncPermissions([
            'manage own schedule',
            'view own appointments',
            'manage own profile',
        ]);

        $patient->syncPermissions([
            'view appointments',
            'create appointments',
            'cancel appointments',
            'manage own profile',
        ]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
