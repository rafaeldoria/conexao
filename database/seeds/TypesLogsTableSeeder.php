<?php

use Illuminate\Database\Seeder;

class TypesLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'login',
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'artigos',
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'usuarios',
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'comentarios',
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'emails',
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'instagram',
        ]);
    }
}
