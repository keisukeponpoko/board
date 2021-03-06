<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BoardTableSeeder::class);
        $this->call(ThreadTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
