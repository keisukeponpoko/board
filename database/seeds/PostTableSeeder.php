<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 9) as $i) {
            DB::table('posts')->insert([
                'thread_id' => 1,
                'name' => 'name' . $i,
                'message' => 'message' . $i,
                'author_hash' => crc32(Hash::make('192.00.000.0' . $i)),
                'password' => Hash::make('secret'),
                'ip_addr' => '192.00.000.0' . $i
            ]);
        }
    }
}
