<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    
    static $names = [
        'Chachalex',
        'Martin',
        'Alexandre',
        'Chadhilati',
        'Charlene'
    ];

    static $emails = [
        'chachalex@chachalex.com',
        'martin@martin.com',
        'alexandre@alexandre.com',
        'chadhilati@chadhilati.com',
        'charlene@charlene.com'
    ];

    static $passwords = [
        'chachalex',
        'martinmartin',
        'alexandre',
        'chadhilati',
        'charlene'
    ];

    static $phones = [
        '0102030405',
        '0102030405',
        '0102030405',
        '0102030405',
        '0102030405'
    ];

    static $nicknames = [
        'chachalexou',
        'martinou',
        'alexandrou',
        'chadhilou',
        'charlenou'
    ];


    public function run()
    {
        
        DB::table('users')->delete();

        for ($i = 0; $i < sizeof(UsersTableSeeder::$names); $i++) {
            DB::table('users')->insert([
                'name' => UsersTableSeeder::$names[$i],
                'email' => UsersTableSeeder::$emails[$i],
                'password' => Hash::make(UsersTableSeeder::$passwords[$i]),
                'phone' => UsersTableSeeder::$phones[$i],
                'nickname' => UsersTableSeeder::$nicknames[$i],
            ]);

        }

        DB::table('users')->where('name', '=', 'Chachalex')->update(['is_admin' => true]);
        
    }
}

