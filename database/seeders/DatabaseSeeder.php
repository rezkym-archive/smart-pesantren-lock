<?php

namespace Database\Seeders;

use Database\Seeders\RoleDefaultSeeder;
use Database\Seeders\PermissionsDefaultSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SurahSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleDefaultSeeder::class);
        $this->call(PermissionsDefaultSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SurahSeeder::class);
    }
}
