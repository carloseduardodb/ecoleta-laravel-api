<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert(
            ['image_path' => 'lampadas.svg', 'title' => 'Lâmpadas']
        );

        DB::table('items')->insert(
            ['image_path' => 'baterias.svg', 'title' => 'Pilhas e Baterias']
        );

        DB::table('items')->insert(
            ['image_path' => 'papeis-papelao.svg', 'title' => 'Papeis e Papelão']
        );

        DB::table('items')->insert(
            ['image_path' => 'eletronicos.svg', 'title' => 'Residuos Eletrônicos']
        );

        DB::table('items')->insert(
            ['image_path' => 'organicos.svg', 'title' => 'Residuos Orgânicos']
        );

        DB::table('items')->insert(
            ['image_path' => 'oleo.svg', 'title' => 'Óleo de Cozinha']
        );
    }
}
