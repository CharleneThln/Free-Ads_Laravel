<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    //static $id = [1, 2, 3, 4, 5];
    static $name = [
        'SERVICES',
        'JOUETS',
        'VEHICULES',
        'FILMS/LIVRES',
        'INFORMATIQUE'
    ];

    static $slug = [
        'service à la personnne', 
        'jeux, jouets pour enfants', 
        'véhicules de tout type pour circuler',
        'films, dvd, livres, magazines...', 
        'matériel informatique divers : ordinateurs et accessoires'
    ];

    //static $parent_id = [1, 1, 1, 1, 1];

    public function run()
    {
        DB::table('categories')->delete();

        for ($i = 0; $i < sizeof(UsersTableSeeder::$names); $i++) {
            DB::table('categories')->insert([
                //'id' => CategoriesTableSeeder::$id[$i],
                'name' => CategoriesTableSeeder::$name[$i],
                'slug' => CategoriesTableSeeder::$slug[$i],
                //'parent_id' => CategoriesTableSeeder::$parent_id[$i],
            ]);

            /*Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->bigInteger('parent_id')->unsigned()->nullable();
                $table->timestamps();
                $table->foreign('parent_id')->references('id')->on('categories');
            });*/
        }

    }
    
}
