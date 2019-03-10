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
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'artigos',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'usuarios',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'comentarios',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'emails',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('types_logs')->insert([
            'desc_type_logs' => 'instagram',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
