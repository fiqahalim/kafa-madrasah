<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $user = Role::create(['name' => 'user']);
        $student = Role::create(['name' => 'student']);

        // Define permissions
        $permissions = [
            'manage users',
            'manage teachers',
            'manage students',
            'manage programs',
            'manage products',
            'view dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $admin->givePermissionTo($permissions);
        $teacher->givePermissionTo('view dashboard');
        $user->givePermissionTo('view dashboard');
    }
}
