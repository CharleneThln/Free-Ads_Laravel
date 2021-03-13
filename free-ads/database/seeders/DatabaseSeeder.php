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
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded!\n');

        $this->call(AdsTableSeeder::class);
        $this->command->info('Ads table seeded!');

        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories table seeded!');
    }
}
