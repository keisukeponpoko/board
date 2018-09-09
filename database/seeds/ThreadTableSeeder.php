<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            'name' => 'スレッド１',
            'board_id' => 1
        ]);

        DB::table('threads')->insert([
            'name' => 'スレッド２',
            'board_id' => 1
        ]);
    }
}
