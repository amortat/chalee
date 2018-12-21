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
        // $this->call(UsersTableSeeder::class);
        factory(App\Mission::class, 7)->create();
        factory(App\Game::class, 3)->create();
        factory(App\Challenge::class, 3)->create();
    }
}
