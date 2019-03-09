<?php

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
        $this->call(TypesUsersTableSeeder::class);
        $this->call(TypesLogsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
