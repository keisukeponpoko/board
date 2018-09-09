<?php

use Illuminate\Database\Seeder;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
            'name' => 'テスト掲示板1',
            'description' => 'これはテスト掲示板1です。'
        ]);

        DB::table('boards')->insert([
            'name' => 'テスト掲示板2',
            'description' => 'これはテスト掲示板2です。'
        ]);
    }
}
