<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(SettingSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(GradeUnitSeeder::class);
        $this->call(GoalTypeSeeder::class);
        $this->call(OperatorSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(DifficultySeeder::class);
        $this->call(AppreciationSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
