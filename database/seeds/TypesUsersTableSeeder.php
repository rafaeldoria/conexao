<?php

use Illuminate\Database\Seeder;

class TypesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types_users')->insert([
            'desc_type_user' => 'admin',
            'status_type_user' => 'A',
        ]);
        DB::table('types_users')->insert([
            'desc_type_user' => 'author',
            'status_type_user' => 'A',
        ]);
        DB::table('types_users')->insert([
            'desc_type_user' => 'visitant',
            'status_type_user' => 'A',
        ]);
    }
}
