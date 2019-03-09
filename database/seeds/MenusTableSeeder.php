<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'title' => 'Usuários',
            'route' => 'users',
            'class' => 'fa fa-users',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Tipos Usuários',
            'route' => 'typesusers',
            'class' => 'fa fa-users-cog',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Artigos',
            'route' => 'articles',
            'class' => 'fa fa-book-reader',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Tipos Artigos',
            'route' => 'typesarticles',
            'class' => 'fa fa-adress-book',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Comentários',
            'route' => 'comments',
            'class' => 'fa fa-comments',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Logs',
            'route' => 'logs',
            'class' => 'fa fa-list_alt',
            'visibility' => 'S',
        ]);
        DB::table('menus')->insert([
            'title' => 'Instagram',
            'route' => 'instagram',
            'class' => 'fa fa-instagram',
            'visibility' => 'S',
        ]);
    }
}
