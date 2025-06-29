<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SettingLeverageSeeder::class,
            RunningNumberSeeder::class,
        ]);
    }
}
