<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin role
        /* Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]); */

        // Musyrif role
        /* Role::create([
            'name' => 'musyrif',
            'guard_name' => 'web',
        ]);

        // Mudaris role
        Role::create([
            'name' => 'mudaris',
            'guard_name' => 'web',
        ]);

        // Ortu role
        Role::create([
            'name' => 'ortu',
            'guard_name' => 'web',
        ]); */

        // Student role
        /* Role::create([
            'name' => 'teacher',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'student',
            'guard_name' => 'web',
        ]); */
    }
}
