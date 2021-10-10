<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

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

        // Reset cached roles and permissions
        $configRoleHasPermission = config('role_permission.role_has_permission');

        // Separate data owned by "role has permission" in config
        foreach ($configRoleHasPermission as $dataRoleHasPermission) {

            // Inserting permissions to database
            $insertPermissions = fn ($role) => collect($dataRoleHasPermission[$role])
                ->map(fn ($name) => DB::table('permissions')->insertGetId(['name' => $name, 'guard_name' => 'web']))
                ->toArray();

            // Summarizes the received data into an array
            foreach ($dataRoleHasPermission as $key => $value) {
                $permissionIdsByRole = [
                    $key => $insertPermissions($key),
                ];
            }

            // Match and insert data into "role_has_permission" database
            foreach ($permissionIdsByRole as $role => $permissionIds) {

                // Find role by name
                $role = Role::whereName($role)->first();

                // Match and innserting to database
                DB::table('role_has_permissions')
                    ->insert(
                        collect($permissionIds)->map(fn ($id) => [
                            'role_id' => $role->id,
                            'permission_id' => $id
                        ])->toArray()
                    );
            }
        }
    }
}
