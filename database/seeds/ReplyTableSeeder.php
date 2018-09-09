<?php

use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([
            'post_id' => 6,
            'reply_post_id' => 1
        ]);

        DB::table('replies')->insert([
            'post_id' => 6,
            'reply_post_id' => 5
        ]);

        DB::table('replies')->insert([
            'post_id' => 9,
            'reply_post_id' => 6
        ]);
    }
}
