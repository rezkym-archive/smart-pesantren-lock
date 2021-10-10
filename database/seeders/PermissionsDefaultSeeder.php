<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'primary_dashboard_all', 'guard_name' => 'web']);

        Permission::create(['name' => 'manage_kesantrian_admin', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage_halaqoh_admin', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage_attendance_admin', 'guard_name' => 'web']);

        Permission::create(['name' => 'halaqoh_teacher', 'guard_name' => 'web']);
        Permission::create(['name' => 'attendance_teacher', 'guard_name' => 'web']);
        
        Permission::create(['name' => 'mutabaah_student', 'guard_name' => 'web']);




        // create roles and assign existing permissions
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo(
            Permission::where('name', 'LIKE', '%admin%')
                ->Orwhere('name', 'LIKE', '%all%')
                ->get()
        );

        $teacher_role = Role::create(['name' => 'teacher']);
        $teacher_role->givePermissionTo(
            Permission::where('name', 'LIKE', '%teacher%')
                ->Orwhere('name', 'LIKE', '%all%')
                ->get()
        );

        $student_role = Role::create(['name' => 'student']);
        $student_role->givePermissionTo(
            Permission::where('name', 'LIKE', '%student%')
            ->Orwhere('name', 'LIKE', '%all%')
                ->get()
        );

        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
